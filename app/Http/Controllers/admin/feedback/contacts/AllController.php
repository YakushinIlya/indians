<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class AllController extends Controller
{
    public function __invoke(): string
    {
        $title    = "Контакты";
        $contacts = Contacts::orderByDesc("id")->paginate();

        return view("admin.feedback.contacts.all", compact("title", "contacts"));
    }
}
