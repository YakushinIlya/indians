<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\lk\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UserRequest $request, int $id)
    {
        if(empty($request->password)) {
            $request->request->remove('password');
        }
        $data = $request->validated();
        isset($data['password']) ? $data['password'] = Hash::make($data['password']) : $data = $request->except('password');

        User::find($id)->update($data);

        return redirect()->back()->with("status", "Пользователь успешно изменен");
    }
}
