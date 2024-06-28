<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Option;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class DeleteAllController extends Controller
{
    public function __invoke()
    {
        $products = Products::all();
        foreach($products as $product) {
            foreach(json_decode($product->images) as $img) {
                File::delete(public_path().'/storage/images/products/'.$img);
            }
            $product->option()->detach();
            $product->delete();
        }
        Option::query()->delete();

        return redirect()->back()->with("status", "Товары, опции товаров успешно удалены");
    }
}
