<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function __invoke($slug)
    {
        $title   = "Новости";
        $new     = News::where("slug", $slug)->firstOrFail();
        $rubrics = Rubrics::orderBy("id", "desc")->get();

        return view("news.index", compact("title", "new", "rubrics"));
    }
}
