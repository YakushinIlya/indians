<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class BlockedController extends Controller
{
    public function __invoke(): string
    {
        $title = "Все пользователи";
        $users = User::where("status", 0)->orderBy("id", "desc")->paginate();

        return view("admin.user.all", compact("title", "users"));
    }
}
