<?php

namespace App\Http\Controllers\admin\rubrics;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;

class AllController extends Controller
{
    public function __invoke(): string
    {
        $title   = "Все разделы новостей";
        $rubrics = Rubrics::orderBy("id", "desc")->paginate();

        return view("admin.rubrics.all", compact("title", "rubrics"));
    }
}
