<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class RestoreController extends Controller
{
    public function __invoke(int $id)
    {
        User::withTrashed()->find($id)->restore();

        return redirect()->route("admin.user.all")->with("status", "Пользователь успешно возрожден");
    }
}
