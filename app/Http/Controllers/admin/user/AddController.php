<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke(): string
    {
        $title = "Добавить пользователя";

        return view("admin.user.add", compact("title"));
    }
}
