<?php

namespace App\Traits;

use App\Models\Basket;

trait HasProductsAndBasket
{
    public function basket()
    {
        return $this->hasOne(Basket::class, 'productId');
    }
}
