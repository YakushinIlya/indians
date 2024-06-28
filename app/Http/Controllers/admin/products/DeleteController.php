<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $product = Products::find($id);
        foreach(json_decode($product->images) as $img) {
            File::delete(public_path().'/storage/images/products/'.$img);
        }
        $product->option()->detach();
        $product->delete();

        return redirect()->back()->with("status", "Товар успешно удален");
    }
}
