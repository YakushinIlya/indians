<?php

namespace App\Http\Controllers\admin\news;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;

class AddController extends Controller
{
    public function __invoke(): string
    {
        $title   = "Добавить новость";
        $rubrics = Rubrics::all();

        return view("admin.news.add", compact("title", "rubrics"));
    }
}
