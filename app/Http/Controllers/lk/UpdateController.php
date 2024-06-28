<?php

namespace App\Http\Controllers\lk;

use App\Http\Controllers\Controller;
use App\Http\Requests\lk\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UserRequest $request)
    {
        if(empty($request->password)) {
            $request->request->remove('password');
        }
        $user = Auth::user();
        $data = $request->validated();
        isset($data['password']) ? $data['password'] = Hash::make($data['password']) : $data = $request->except('password');

        $user->update($data);

        return redirect()->route("lk.index");
    }
}
