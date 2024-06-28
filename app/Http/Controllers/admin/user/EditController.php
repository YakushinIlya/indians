<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(int $id): string
    {
        $title = "Редактировать пользователя";
        $user  = User::find($id);

        return view("admin.user.edit", compact("title", "user"));
    }
}
