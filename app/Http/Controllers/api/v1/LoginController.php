<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($request->only('phone', 'password'))) {
            return response()->json([
                "status" => 200,
                "data"   => $data
            ], 200);
        }

        return response()->json([
            "status" => 422,
            "errors"   => [
                "phone" => "Возможно неверный номер телефона",
                "password" => "Возможно неверный пароль",
            ]
        ], 422);
    }
}
