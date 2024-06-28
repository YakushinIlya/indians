<?php

namespace App\Http\Controllers\lk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function __invoke()
    {
        $title = "Скидочная система";
        $user = Auth::user();

        return view("lk.sales", compact("user", "title"));
    }
}
