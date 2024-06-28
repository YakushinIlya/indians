<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasNewsAndRubrics;

class News extends Model
{
    use HasFactory, HasNewsAndRubrics;

    protected $fillable = [
        "title", "slug", "content", "image"
    ];
}
