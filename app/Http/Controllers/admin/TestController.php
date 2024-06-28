<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function __invoke(): string
    {
        $title = "Test page";

        return view("admin.test", compact("title"));
    }
}
