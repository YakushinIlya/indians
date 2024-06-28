<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminsController extends Controller
{
    public function __invoke(): string
    {
        $title = "Администраторы";

        $users = User::whereHas(
            'roles', function($q){
            $q->where("slug", "admin");
        })->orderBy("id", "desc")->paginate();

        return view("admin.user.all", compact("title", "users"));
    }
}
