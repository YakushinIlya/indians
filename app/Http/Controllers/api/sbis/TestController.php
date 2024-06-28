<?php

namespace App\Http\Controllers\api\sbis;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TestController extends Controller
{
    private string $app_client_id;
    private string $app_secret;
    private string $secret_key;

    public function __construct()
    {
        $sbisConf = config('sbis');

        $this->app_client_id = $sbisConf['app_client_id'];
        $this->app_secret    = $sbisConf['app_secret'];
        $this->secret_key    = $sbisConf['secret_key'];
    }

    public function setConnect(): array
    {
        $apiURL = 'https://online.sbis.ru/oauth/service/';
        $auth   = [
            'app_client_id' => $this->app_client_id,
            'app_secret'    => $this->app_secret,
            'secret_key'    => $this->secret_key,
        ];
        $headers = [
            'Content-type: charset=utf-8'
        ];

        $response     = Http::withHeaders($headers)->post($apiURL, $auth);
        $responseBody = json_decode($response->getBody(), true);

        return $responseBody;
    }

    public function getPointSale(): array
    {
        $connect = $this->setConnect();

        $apiURL  = 'https://api.sbis.ru/retail/point/list';
        $body    = [
            'product'      => 'retail',
            'withPhones'   => true,
            'withPrices'   => true,
            'withSchedule' => true,
            'page'         => 0,
            'pageSize'     => 10,
        ];
        $headers = [
            'Content-type: charset=utf-8',
            'X-SBISSessionId: '.$connect['sid']
        ];

        $response     = Http::withHeaders($headers)->withToken($connect['access_token'])->get($apiURL, $body);
        $responseBody = json_decode($response->getBody(), true);

        return $responseBody['salesPoints'];
    }

    public function getPriceList(): array
    {
        $pointsSale = $this->getPointSale();
        $connect    = $this->setConnect();

        $apiURL  = 'https://api.sbis.ru/retail/nomenclature/price-list';
        $body    = [
            'pointId'    => $pointsSale[0]['id'],
            'actualDate' => date('Y-m-d'),
        ];
        $headers = [
            'Content-type: charset=utf-8',
            'X-SBISSessionId: '.$connect['sid']
        ];

        $response     = Http::withHeaders($headers)->withToken($connect['access_token'])->get($apiURL, $body);
        $responseBody = json_decode($response->getBody(), true);

        return $responseBody['priceLists'];
    }

    public function getImage($img): mixed
    {
        $connect = $this->setConnect();
        $headers = [
            'Content-type: charset=utf-8',
            'X-SBISSessionId: '.$connect['sid'],
            'X-SBISAccessToken: '.$connect['access_token']
        ];
        $response = Http::withHeaders($headers)->withToken($connect['access_token'])->get('https://api.sbis.ru/retail/'.$img);

        $random   = Str::random(20);
        $fileName = 'img-'.$random.'.png';
        $pathName = public_path().'/storage/images/products/';

        file_put_contents($pathName.$fileName, $response);

        return $fileName;
    }

    public function getData(int $page = 0, int $pageSize = 50): array
    {
        dd($this->getPointSale());
        $pointsSale = $this->getPointSale()[0]['id'];
        $priceId    = $this->getPriceList()[0]['id'];
        $connect    = $this->setConnect();

        $apiURL  = 'https://api.sbis.ru/retail/nomenclature/list';
        $body    = [
            'pointId'     => $pointsSale,
            'priceListId' => $priceId,
            'withBalance' => true,
            'page'        => $page,
            'pageSize'    => $pageSize,
        ];
        $headers = [
            'Content-type: charset=utf-8',
            'X-SBISSessionId: '.$connect['sid']
        ];

        $response     = Http::withHeaders($headers)->withToken($connect['access_token'])->get($apiURL, $body);
        $responseBody = json_decode($response->getBody(), true);

        foreach($responseBody['nomenclatures'] as $res) {
            if($res['nomNumber'] && $res['cost']) {
                $arrImg = [];
                foreach($res['images']??[] as $img) {
                    $arrImg[] = $this->getImage($img);
                }
                Products::updateOrCreate([
                    'sbis_id'    => $res['id'],
                    'externalId' => $res['externalId'],
                ], [
                    'title'              => $res['name'],
                    'sbis_id'            => $res['id'],
                    'externalId'         => $res['externalId'],
                    'hierarchicalId'     => $res['hierarchicalId'],
                    'hierarchicalParent' => $res['hierarchicalParent'],
                    'article'            => $res['nomNumber'],
                    'price'              => $res['cost'],
                    'desc'               => $res['description'],
                    'options'            => json_encode($res['attributes']),
                    'images'             => json_encode($arrImg),
                ]);
            } else {
                Categories::updateOrCreate([
                    'sbis_id'        => $res['hierarchicalId'],
                ], [
                    'title'          => $res['name'],
                    'sbis_id'        => $res['hierarchicalId'],
                    'sbis_id_parent' => $res['hierarchicalParent'],
                ]);
            }
        }

        return $responseBody;
    }
}
