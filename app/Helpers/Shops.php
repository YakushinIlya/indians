<?php

namespace App\Helpers;

use App\Models\Basket;
use App\Models\Contacts;
use App\Models\Products;
use \App\Models\Shops as ShopsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Shops
{
    public static function getAll(): ShopsModel
    {
        return ShopsModel::all();
    }

    public static function getAllData(array $data): mixed
    {
        return ShopsModel::select($data)->get();
    }

    public static function getShop(): ShopsModel
    {
        //return ShopsModel::find($id);
    }

    public static function getAddressTimeAll(): object
    {
        if(!Cache::get('AddressTimeAll')){
            $AddressTimeAll = ShopsModel::select("id", "address", "worktime")->get();
            Cache::put('AddressTimeAll', $AddressTimeAll, 86400);
        }

        return Cache::get('AddressTimeAll');
    }

    public static function getTimeNowEnd(int $hourNow, int $hourEnd): int
    {
        return $hourEnd-$hourNow;
    }

    public static function getTimeEndNow(int $hourNow, int $hourStart, int $hourEnd): int
    {
        if($hourNow<$hourEnd && $hourNow<$hourStart) {
            return $hourStart-$hourNow;
        }
        if($hourNow>=$hourEnd && $hourNow>$hourStart) {
            return 24-$hourNow+$hourStart;
        }

        return 0;
    }

    public static function getCountBasket($id = 0): int
    {
        return Basket::where("userId", (int)$id)->count();
    }

    public static function getContacts(): object | null
    {
        return Contacts::where("active", true)->first()??null;
    }

    public static function getItogoSum($data)
    {
        $productSum = 0;
        foreach($data['productCount'] as $k => $v){
           $product = Products::select('price')->where('id', $k)->first();

            $productSum += $product['price']*$v;
        }

        return $productSum;
    }

}
