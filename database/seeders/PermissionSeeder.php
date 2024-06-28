<?php

namespace Database\Seeders;

use App\Models\Permission as Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permissions();
        $manageUser->name = 'Все права';
        $manageUser->slug = 'all-permissions';
        $manageUser->save();
        $createTasks = new Permissions();
        $createTasks->name = 'Клиентская часть';
        $createTasks->slug = 'client-section';
        $createTasks->save();
    }
}
