<?php

namespace App\Http\Controllers\basket;

use App\Helpers\Shops;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = "Детали заказа";
        $user  = Auth::user();

        $itogoSum = Shops::getItogoSum($request);

        return view("basket.details", compact("title", "user", "itogoSum"));
    }
}
