<?php

namespace App\Http\Controllers\admin\categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $category = Categories::find($id);
        $category->delete();

        return redirect()->back()->with("status", "Товар успешно удален");
    }
}
