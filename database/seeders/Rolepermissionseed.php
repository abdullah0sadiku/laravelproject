<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Rolepermissionseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles_Permissions = [
            'Owner' => [ 'Add-Pro' ,'Update-Pro', 'Delete-Pro', 'Add-User' , 'Delete-User' , 'Update-User' , 'Submit-Order' , 'Confirm-Order' , 'Delete-Order' , 'TeamSP-Chat']
            ,'Admin' => [  'Add-Pro' ,'Update-Pro', 'Delete-Pro', 'Update-User' , 'Submit-Order' , 'Confirm-Order' , 'Delete-Order' ]
            ,'TeamSupport' => ['TeamSP-Chat' , 'Submit-Order' , 'Confirm-Order' , 'Delete-Order']
            ,'Customer' => ['Submit-Order']
        ];
        foreach($roles_Permissions as $role => $permiisons){
            foreach($permiisons as $permiison){
                Role::where('name', $role)->first()->GivePermissionTo($permiison);
            }
        }
    }
}
