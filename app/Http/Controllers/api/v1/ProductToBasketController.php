<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\ProductToBasketRequest;
use Illuminate\Support\Facades\Cookie;
use App\Models\Basket;

class ProductToBasketController extends Controller
{
    public function __invoke(ProductToBasketRequest $request, Basket $model)
    {
        $data = $request->validated();

        $guestId = Cookie::get('guestId');
        $basket = [
            "price"     => $data["price"],
            "productId" => $data["productId"],
        ];

        if($data["userId"]==0 || $data["userId"]==null || $data["userId"]==''){
            $basket["guestId"] = $guestId;
            $modelUser = $model::where("guestId", $guestId);
        } else {
            $basket["userId"] = $data["userId"];
            $modelUser = $model::where("userId", $data["userId"]);
        }

        $model::updateOrCreate([
            "productId" => $data["productId"]
        ], $basket);

        $data = [
            'count'  => $modelUser->count(),
            'sum'    => $modelUser->sum('price'),
            'userId' => $data["userId"],
        ];

        return response()->json($data)->setStatusCode(200);
    }
}
