<?php

namespace App\Http\Controllers\admin\news;

use App\Http\Controllers\Controller;
use App\Models\News;

class AllController extends Controller
{
    public function __invoke(): string
    {
        $title = "Все новости";
        $news  = News::orderBy("id", "desc")->paginate();

        return view("admin.news.all", compact("title", "news"));
    }
}
