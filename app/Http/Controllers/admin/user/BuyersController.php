<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class BuyersController extends Controller
{
    public function __invoke(): string
    {
        $title = "Покупатели";

        $users = User::whereHas(
            'roles', function($q){
            $q->where("slug", "buyer");
        })->orderBy("id", "desc")->paginate();

        return view("admin.user.all", compact("title", "users"));
    }
}
