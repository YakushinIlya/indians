<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;

class EditController extends Controller
{
    public function __invoke(int $id): string
    {
        $title = "Редактировать страницу";
        $page  = Pages::find($id);

        return view("admin.pages.edit", compact("title", "page"));
    }
}
