<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\ProductToBasketRequest;
use App\Models\Basket;
use Illuminate\Support\Facades\Cookie;

class ProductTrashBasketController extends Controller
{
    public function __invoke(ProductToBasketRequest $request, Basket $model)
    {
        $data = $request->validated();

        if($data["userId"]==0 || $data["userId"]==null || empty($data["userId"])){
            $data["guestId"] = Cookie::get('guestId');
            $model::where("guestId", $data["guestId"])->where("productId", $data["productId"])->delete();
            $modelProduct = $model::where("guestId", $data["guestId"]);
        } else {
            $model::where("userId", $data["userId"])->where("productId", $data["productId"])->delete();
            $modelProduct = $model::where("userId", $data["userId"]);
        }

        return response()->json([
            "count"  => $modelProduct->count(),
            "sum"    => $modelProduct->sum("price"),
            "userId" => $data["userId"],
        ])->setStatusCode(200);
    }
}
