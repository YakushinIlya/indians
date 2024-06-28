<?php

namespace App\Http\Controllers\api\sbis;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Option;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductsCategoriesV2Controller extends Controller
{
    public array $result;

    public function test(Request $request)
    {
        $result = "success\n";
        $path	= "/upload/integration/";

        if ($request->type == "catalog") {

            switch ($request->mode):
                case "checkauth":
                    die($result.$result.$result);
                    break;
                case "init":
                    die("zip=no" . "\r\n" . "file_limit=0");
                    break;
                case "file":

                    $filename = (strpos($request->filename, ".") == 0) ? substr($request->filename, 1) : $request->filename;
                    $dirname = dirname(public_path().$path . 'dir/'.$filename);
                    if (!is_dir($dirname)) {
                        mkdir($dirname, 0755, true);
                    }
                    $file = fopen(public_path().$path . 'dir/'.$filename, 'w');
                    fwrite($file, file_get_contents('php://input'));
                    fclose($file);

                    $this->readXMLProduct($request->mode);
                    $this->readXMLCategory($request->mode);
                    //sleep(5);

                    die($result);

                    /*if($extension=='xml'){
                        $xmlFilename = public_path().$path.date('d-m-Y').'_'.$request->filename;
                        file_put_contents($xmlFilename, file_get_contents("php://input"), FILE_APPEND | LOCK_EX);
                        if (file_exists($xmlFilename)) {
                            $this->importXML($xmlFilename);
                            die($result);
                        }
                    }*/
                    break;
            endswitch;
        }

    }

    public function readXML($request=null)
    {
        $file = public_path().'/upload/integration/dir/import0_1.xml';

        if(is_file($file)) {
            $xmlFile = file_get_contents($file);
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $result = json_decode($jsonFormatData, true);
            $res = [
                'Категории' => $result['Классификатор']['Группы']['Группа']??[],
                'Опции'     => $result['Классификатор']['Свойства']['Свойство']??[],
                'Товары'    => $result['Каталог']['Товары']['Товар']??[],
            ];

            //$this->customLog($res, 'file-xml');

            $this->result['categories'] = $this->importCategory($res['Категории']);
            $this->result['option']     = $this->importOption($res['Опции']);
            $this->result['product']    = $this->importProduct($res['Товары']);

            if($request==null) {
                die('<b>Добавлено или обновлено</b>
                    <p>
                    <i>Категории: </i> '.count($this->result['categories']).'<br>
                    <i>Опции: </i> '.count($this->result['option']).'<br>
                    <i>Товары: </i> '.count($this->result['product']).'<br>
                    </p>
                    <p>Последние обновления от СБИС: <br>
                    '.$this->fileTime($file).'</p>');
            }
        }

        return 'No such file';
    }

    public function readXMLProduct($request=null)
    {
        $file = public_path().'/upload/integration/dir/import0_1.xml';

        if(is_file($file)) {
            $xmlFile = file_get_contents($file);
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $result = json_decode($jsonFormatData, true);
            //$result['Каталог']['Товары']['Товар']['Цена'] = $this->readXMLProductPrice($result['Каталог']['Товары']['Товар']);
            $res = [
                'Товары'    => $result['Каталог']['Товары']['Товар']??[],
            ];


            return $this->importProduct($res['Товары']);
        }

        return 'No such file';
    }

    public function readXMLProductPrice($request=null)
    {
        $file = public_path().'/upload/integration/dir/offers0_1.xml';

        if(is_file($file)) {
            $xmlFile = file_get_contents($file);
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $result = json_decode($jsonFormatData, true);
            $res = [
                'Цена'    => ($result['ПакетПредложений']['Предложения']['Предложение']['Ид']==$request['Ид'])??[],
            ];

            return $this->importProduct($res['Цена']);
        }

        return 'No such file';
    }

    public function readXMLOption($request=null)
    {
        $file = public_path().'/upload/integration/dir/import0_1.xml';

        if(is_file($file)) {
            $xmlFile = file_get_contents($file);
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $result = json_decode($jsonFormatData, true);
            $res = [
                'Опции'     => $result['Классификатор']['Свойства']['Свойство']??[],
            ];

            return $this->importOption($res['Опции']);
        }

        return 'No such file';
    }

    public function readXMLCategory($request=null)
    {
        $file = public_path().'/upload/integration/dir/import0_1.xml';

        if(is_file($file)) {
            $xmlFile = file_get_contents($file);
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $result = json_decode($jsonFormatData, true);
            $res = [
                'Категории'     => $result['Классификатор']['Группы']['Группа']??[],
            ];

            return $this->importOption($res['Категории']);
        }

        return 'No such file: '.$file;
    }

    public function relocationAllImages($request=null)
    {
        $dirFrom = public_path().'/upload/integration/dir/';
        $dirTo   = public_path().'/upload/product/image/';
        $images = [];

        foreach(glob($dirFrom . '*.{jpeg,jpg,png}', GLOB_BRACE) as $img) {
            $img = str_replace($dirFrom, '', stripcslashes($img));
            if(file_exists($dirFrom.$img)) {
                copy($dirFrom.$img, $dirTo.$img);
                unlink($dirFrom.$img);
                $images[] = $img;
            }
        }

        dd([
            'COUNT:' => count($images),
            'LIST:'  => $images,
        ]);
    }

    public function importCategory(array $categories, string $idParent = null) : array
    {
        $result = [];
        foreach($categories as $kCat => $vCat) {
            if(!isset($vCat['Ид'])||!is_string($vCat['Ид'])) {
                continue;
            }
            $result[] = Categories::updateOrCreate([
                'sbis_id'        => $vCat['Ид'],
            ], [
                'title'          => $vCat['Наименование'],
                'sbis_id'        => $vCat['Ид'],
                'sbis_id_parent' => $idParent,
            ]);

            if(isset($vCat['Группы'])) {
                $this->importCategory($vCat['Группы']['Группа'], $vCat['Ид']);
            }
        }

        return $result;
    }

    public function importOption(array $options) : array
    {
        $result = [];
        foreach($options as $kOpt => $vOpt) {
            if(!isset($vOpt['Ид'])||!is_string($vOpt['Ид'])) {
                continue;
            }
            $result[] = Option::updateOrCreate([
                'sbis_id' => $vOpt['Ид'],
            ], [
                'sbis_id' => $vOpt['Ид'],
                'title'   => $vOpt['Наименование'],
            ]);
        }

        return $result;
    }

    public function importProduct(array $products) : array
    {
        $result = [];
        foreach($products as $kProd => $vProd) {
            if(!isset($vProd['Ид'])||!is_string($vProd['Ид'])) {
                continue;
            }
            if(isset($vProd['Картинка'])&&is_array($vProd['Картинка'])) {
                $images = $vProd['Картинка'];
            } elseif(isset($vProd['Картинка'])&&!is_array($vProd['Картинка'])) {
                $images = [$vProd['Картинка']];
            } else {
                $images = [$vProd['Картинка']??'no_img.jpg'];
            }
            $result[] = Products::updateOrCreate([
                'sbis_id' => $vProd['Ид'],
            ], [
                'sbis_id' => $vProd['Ид'],
                'title'   => $vProd['Наименование']??null,
                'desc'    => $vProd['Описание']??null,
                'images'  => json_encode($images, true),
                'options' => json_encode($vProd['Группы']??null, true),
                'price'   => 0,
            ]);

            $this->movingImages($images);
        }

        return $result;
    }

    public function movingImages(array $images = [])
    {
        $dirFrom = public_path().'/upload/integration/dir/';
        $dirTo   = public_path().'/upload/product/image/';
        foreach($images as $img) {
            if(file_exists($dirFrom.$img)) {
                copy($dirFrom.$img, $dirTo.$img);
                unlink($dirFrom.$img);
            }
        }

        return $images;
    }

    public function fileTime(string $file) : string
    {
        clearstatcache();
        $fileDateA = date ("d/m/Y H:i:s", fileatime($file));
        clearstatcache();
        $fileDateM = date ("d/m/Y H:i:s", filemtime($file));
        clearstatcache();
        $fileDateC = date ("d/m/Y H:i:s", filectime($file));

        $result = "<table cellpadding='5px'><tbody>";

        $result .= "<tr><td>Чтение файла:</td> <td><b>{$fileDateA}</b>(МСК)</td></tr>";
        $result .= "<tr><td>Запись файла:</td> <td><b>{$fileDateM}</b>(МСК)</td></tr>";
        $result .= "<tr><td>Создание файла:</td> <td><b>{$fileDateC}</b>(МСК)</td></tr>";

        $result .= "</tbody></table>";

        return $result;
    }

    public function customLog($arrLog = [], $nameLog = 'default')
    {
        Log::channel('info_file')->error('LOG: '.date('Y-m-d H:i:s'), $arrLog);
        //Log::channel('stack')->error('Something went wrong');

    }

}
