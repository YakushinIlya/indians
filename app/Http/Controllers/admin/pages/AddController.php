<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke(): string
    {
        $title   = "Добавить страницу";

        return view("admin.pages.add", compact("title"));
    }
}
