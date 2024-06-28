<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeletedController extends Controller
{
    public function __invoke(): string
    {
        $title = "Удаленные";
        $users = User::onlyTrashed()->orderBy("id", "desc")->paginate();

        return view("admin.user.deleted", compact("title", "users"));
    }
}
