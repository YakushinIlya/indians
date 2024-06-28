<?php

namespace App\Http\Controllers\admin\categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class AllController extends Controller
{
    public function __invoke(): string
    {
        $title      = "Все категории";
        $categories = Categories::orderBy("id", "desc")->paginate();

        return view("admin.categories.all", compact("title", "categories"));
    }
}
