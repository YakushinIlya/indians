<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $user = User::find($id);
        $user->update(["status"=>3]);
        $user->delete();

        return redirect()->back()->with("status", "Пользователь успешно удален");
    }
}
