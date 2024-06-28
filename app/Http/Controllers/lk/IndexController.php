<?php

namespace App\Http\Controllers\lk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $title = "Профиль";
        $user = Auth::user();

        return view("lk.index", compact("user", "title"));
    }
}
