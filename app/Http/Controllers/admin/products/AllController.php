<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\Products;

class AllController extends Controller
{
    public function __invoke(): mixed
    {
        $title    = "Все товары";
        $products = Products::orderBy("id", "desc")->paginate();

        return view("admin.products.all", compact("title", "products"));
    }
}
