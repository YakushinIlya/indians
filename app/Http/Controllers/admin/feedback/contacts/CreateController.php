<?php

namespace App\Http\Controllers\admin\feedback\contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ContactsRequest;
use Illuminate\Support\Str;
use App\Models\Contacts;

class CreateController extends Controller
{
    public function __invoke(ContactsRequest $request)
    {
        $data = $request->validated();

        $data["active"] = false;
        Contacts::create($data);

        return redirect()->route("admin.feedback.contacts")->with("status", "Контакты успешно созданы");
    }
}
