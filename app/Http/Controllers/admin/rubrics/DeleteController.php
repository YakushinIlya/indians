<?php

namespace App\Http\Controllers\admin\rubrics;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $rubric = Rubrics::find($id);
        $rubric->delete();

        return redirect()->back()->with("status", "Раздел новости успешно удален");
    }
}
