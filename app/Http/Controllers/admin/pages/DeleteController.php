<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $page = Pages::find($id);
        $page->delete();

        return redirect()->back()->with("status", "Страница успешно удалена");
    }
}
