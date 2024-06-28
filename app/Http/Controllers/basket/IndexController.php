<?php

namespace App\Http\Controllers\basket;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function __invoke(): string
    {
        $title   = "Корзина";
        $sum     = 0;
        $blade   = 'index';
        $userId  = Auth::user()->id??0;
        $guestId = Cookie::get('guestId');

        $products = Products::select("id", "title", "price", "images")->whereHas("basket", function($q) use ($userId, $guestId) {
            if(Auth::check()){
                $q->where("userId", $userId);
            } else {
                $q->where("guestId", $guestId);
            }
        })->orderByDesc("id")->get();
        if($products->isEmpty()) {
            $blade = 'empty';
        }

        return view("basket.".$blade, compact("title", "products", "sum", "userId"));
    }
}
