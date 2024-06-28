<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\RegisterRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $buyer  = Role::where('slug', 'buyer')->first();
        $client = Permission::where('slug', 'client-section')->first();

        $user = User::firstOrCreate([
            "phone" => $data["phone"],
        ], $data);

        $user->roles()->attach($buyer);
        $user->permissions()->attach($client);

        return response()->json([
            "status" => 201,
            "route"  => route("lk.index"),
            "data"   => $data
        ], 201);
    }
}
