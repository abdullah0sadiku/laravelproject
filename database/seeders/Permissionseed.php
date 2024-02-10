<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Permissionseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['Create-Cat' , 'Add-Pro' , 'Delete-Pro', 'Add-User' , 'Delete-User' , 'Update-Pro' , 'Submit-Order' , 'Confirm-Order'];
        foreach($permissions as $permission){
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
