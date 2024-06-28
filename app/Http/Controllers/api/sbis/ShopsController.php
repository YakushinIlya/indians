<?php

namespace App\Http\Controllers\api\sbis;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Shops;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ShopsController extends Controller
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

    public function getData()
    {

        $pointSale = $this->getPointSale();

        foreach($pointSale as $shop) {
            Shops::updateOrCreate([
                "id_sbis" => $shop["id"]
        ], [
            "address"   => $shop["address"],
            "name"      => $shop["name"],
            "locality"  => $shop["locality"],
            "latitude"  => $shop["latitude"],
            "longitude" => $shop["longitude"],
            "phone"     => $shop["phone"],
            "phones"    => json_encode($shop["phones"]),
            "worktime"  => json_encode($shop["worktime"]),
            ]);
        }

        return redirect()->route("admin.index")->with("status", "Магазины успешно добавлены");
    }
}
