<?php

namespace App\Http\Controllers\admin\news;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Rubrics;

class EditController extends Controller
{
    public function __invoke(int $id): string
    {
        $title   = "Редактировать новость";
        $new     = News::find($id);
        $rubrics = Rubrics::all();

        return view("admin.news.edit", compact("title", "new", "rubrics"));
    }
}
