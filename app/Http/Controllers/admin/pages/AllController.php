<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;

class AllController extends Controller
{
    public function __invoke(): string
    {
        $title = "Все страницы";
        $pages = Pages::orderBy("id", "desc")->paginate();

        return view("admin.pages.all", compact("title", "pages"));
    }
}
