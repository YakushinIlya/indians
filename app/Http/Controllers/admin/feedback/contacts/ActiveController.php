<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class ActiveController extends Controller
{
    public function __invoke(int $id)
    {
        Contacts::where("active", true)->update(["active" => false]);
        $contacts = Contacts::find($id);
        $contacts->update(["active" => true]);

        return redirect()->back()->with("status", "Контакты успешно удалены");
    }
}
