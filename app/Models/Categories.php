<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        "seo_title", "seo_description", "seo_keywords", "sbis_id", "sbis_id_parent", "title"
    ];
}
