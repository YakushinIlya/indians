<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class AllController extends Controller
{
    public function __invoke(): string
    {
        $title = "Все пользователи";
        $users = User::orderBy("id", "desc")->paginate();

        return view("admin.user.all", compact("title", "users"));
    }
}
