<?php

namespace App\Traits;

use App\Models\Option;
use App\Models\Products;

trait HasProductsAndOptions
{
    public function option()
    {
        return $this->belongsToMany(Option::class,'option_product', 'product_id', 'option_id');
    }

    public function product()
    {
        return $this->belongsToMany(Products::class,'option_product', 'option_id', 'product_id');
    }
}
