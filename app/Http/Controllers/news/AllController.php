<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class AllController extends Controller
{
    public function __invoke()
    {
        $title   = "Новости";
        $news    = News::orderBy("id", "desc")->paginate();
        $rubrics = Rubrics::orderBy("id", "desc")->get();

        return view("news.all", compact("title", "news", "rubrics"));
    }
}
