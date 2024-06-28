<?php

namespace Database\Seeders;

use App\Models\Role as Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = new Roles();
        $manager->name = 'Администратор';
        $manager->slug = 'admin';
        $manager->save();
        $developer = new Roles();
        $developer->name = 'Покупатель';
        $developer->slug = 'buyer';
        $developer->save();
    }
}
