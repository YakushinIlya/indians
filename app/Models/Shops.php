<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    protected $table = "shops";

    protected $fillable = [
        "id_sbis", "address", "name", "locality", "latitude", "longitude", "phone", "phones", "worktime",
    ];
}
