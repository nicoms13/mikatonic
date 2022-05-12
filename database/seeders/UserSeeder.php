<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@miskatonic.com', 
            'username' => 'Admin',
            'firstName' => 'Administrator',
            'lastName' => 'Miskatonic',
            'cardNumber' => 'XXXX XXXX XXXX XXXX',
            'cardExpirity' => 'XX/XX',
            'cvc' => '000',
            'paymentType' => 'none',
            'password' => bcrypt('12345678'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->name]);
    }
}
