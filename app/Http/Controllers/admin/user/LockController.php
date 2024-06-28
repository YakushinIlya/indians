<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class LockController extends Controller
{
    public function lockUp(int $id)
    {
        User::find($id)->update([
            "status" => 0,
        ]);
        return redirect()->back()->with("status", "Пользователь успешно заблокирован");
    }

    public function unlockUp(int $id)
    {
        User::find($id)->update([
            "status" => 1,
        ]);
        return redirect()->back()->with("status", "Пользователь успешно разблокирован");
    }
}
