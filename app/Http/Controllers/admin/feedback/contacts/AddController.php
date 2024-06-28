<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class AddController extends Controller
{
    public function __invoke(): string
    {
        $title    = "Добавить контакты";

        return view("admin.feedback.contacts.add", compact("title"));
    }
}
