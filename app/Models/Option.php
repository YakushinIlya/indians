<?php

namespace App\Models;

use App\Traits\HasProductsAndOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'option';

    protected $fillable = [
        "sbis_id", "title",
    ];
}
