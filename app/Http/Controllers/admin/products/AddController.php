<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke(): string
    {
        $title   = "Добавить/Обновить товары";

        return view("admin.products.add", compact("title"));
    }
}
