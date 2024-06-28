<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\lk\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{
    public function __invoke(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::firstOrCreate([
            "phone" => $data["phone"],
        ], $data);

        return redirect()->route("admin.user.all")->with("status", "Пользователь успешно добавлен");
    }
}
