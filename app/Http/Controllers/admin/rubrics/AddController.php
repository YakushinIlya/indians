<?php

namespace App\Http\Controllers\admin\rubrics;

use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke(): string
    {
        $title   = "Добавить раздел новости";

        return view("admin.rubrics.add", compact("title"));
    }
}
