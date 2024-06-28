<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class EditController extends Controller
{
    public function __invoke(int $id)
    {
        $title    = "Изменить контакты";
        $contacts = Contacts::where("id", $id)->first();

        return view("admin.feedback.contacts.edit", compact("title", "contacts"));
    }
}
