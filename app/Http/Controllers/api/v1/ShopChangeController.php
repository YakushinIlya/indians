<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\ShopChangeRequest;
use App\Models\User;

class ShopChangeController extends Controller
{
    public function __invoke(ShopChangeRequest $request)
    {
        $data = $request->validated();

        User::find($data["userId"])->update(["shop"=>$data["shopId"]]);
    }
}
