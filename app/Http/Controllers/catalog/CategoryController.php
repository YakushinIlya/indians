<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $catId      = $request->category;
        $title      = "Каталог";
        $categories = Categories::where('sbis_id_parent', null)->orderByDesc('id')->limit(20)->get();
        $products   = Products::where('hierarchicalId', $catId)->orderByDesc("id")->paginate();

        return view("catalog.all", compact("title", "products", "categories"));
    }
}
