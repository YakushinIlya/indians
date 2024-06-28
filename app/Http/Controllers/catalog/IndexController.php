<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Categories;
use App\Models\Option;
use App\Models\Products;

class IndexController extends Controller
{
    public function __invoke(Option $options, FilterRequest $request)
    {
        $title      = "Каталог";
        $categories = Categories::where('sbis_id_parent', null)->orderByDesc('id')->limit(20)->get();
        $products   = Products::orderByDesc("id")->paginate();
        $fabricator = $options::where('title', 'Производитель')->limit(10)->get();
        $sizes      = $options::where('title', 'like', '%Размер%')->limit(10)->get();
        $materials  = $options::where('title', 'like', '%Материал%')->limit(10)->get();

        if(isset($request->fabricator) || isset($request->size) || isset($request->material)) {
            dd($request->fabricator);
        }

        return view("catalog.all", compact("title", "products", "categories", "fabricator", "sizes", "materials"));
    }
}
