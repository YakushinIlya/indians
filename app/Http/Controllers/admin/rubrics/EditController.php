<?php

namespace App\Http\Controllers\admin\rubrics;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;

class EditController extends Controller
{
    public function __invoke(int $id): string
    {
        $title  = "Редактировать раздел новости";
        $rubric = Rubrics::find($id);

        return view("admin.rubrics.edit", compact("title","rubric"));
    }
}
