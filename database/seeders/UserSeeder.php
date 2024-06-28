<?php

namespace Database\Seeders;

use App\Models\Permission as Permissions;
use App\Models\Role as Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Roles::where('slug','admin')->first();
        $manager = Roles::where('slug', 'buyer')->first();
        $createTasks = Permissions::where('slug','all-permissions')->first();
        $manageUsers = Permissions::where('slug','client-section')->first();
        $user1 = new User();
        $user1->fio = 'Jhon Deo';
        $user1->email = 'jhon@deo.com';
        $user1->phone = '+7(000)000-0000';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);
        $user2 = new User();
        $user2->fio = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->phone = '+7(000)000-0001';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);
    }
}
