<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ContactsRequest;
use App\Models\Contacts;


class UpdateController extends Controller
{
    public function __invoke(ContactsRequest $request, int $id)
    {
        $data = $request->validated();
        $contacts  = Contacts::find($id);
        $contacts->update($data);

        return redirect()->back()->with("status", "Контакты успешно изменены");
    }
}
