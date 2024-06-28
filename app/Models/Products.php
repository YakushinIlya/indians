<?php

namespace App\Models;

use App\Traits\HasProductsAndOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasProductsAndBasket;

class Products extends Model
{
    use HasFactory, HasProductsAndBasket;

    protected $table = "products";

    protected $fillable = [
        "seo_title", "seo_description", "seo_keywords", "images", "title", "article", "count", "options", "price", "desc",
        "sbis_id", "hierarchicalId", "hierarchicalParent", "externalId",
    ];


}
