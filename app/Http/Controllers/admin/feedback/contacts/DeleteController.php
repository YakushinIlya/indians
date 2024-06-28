<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $contacts = Contacts::find($id);
        $contacts->delete();

        return redirect()->back()->with("status", "Контакты успешно удалены");
    }
}
