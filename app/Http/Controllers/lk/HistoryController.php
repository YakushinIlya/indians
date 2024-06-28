<?php

namespace App\Http\Controllers\lk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __invoke()
    {
        $title = "История заказов";
        $user = Auth::user();
        $order = '';

        return view("lk.history", compact("user", "title", "order"));
    }
}
