<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($slug)
    {
        $page = Pages::where("slug", $slug)->firstOrFail();
        $title = $page->title;
        $content = $page->content;

        return view("pages.default-2", compact("title", "content"));
    }
}
