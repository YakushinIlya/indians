<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function __invoke(int $id): string
    {
        $product = Products::find($id);
        $title   = $product->title;

        return view("catalog.show", compact("title", "product"));
    }
}
