<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@domain.com')->exists()) {
            $input = [
                'name' => 'admin',
                'family' => 'intelx',
                'mobile' => '0000000000',
                'email' => 'admin@domain.com',        //username
                'password' => bcrypt('123456'),   //password
                'admin' => 1,
                'status' => 1,
                'remember_token' => Str::random(10),
            ];
            $data = User::create($input);

            $input = [
                'name' => 'admin',
                'permission' => 'a:2:{s:10:"fullAccess";i:1;s:4:"user";a:3:{s:3:"add";i:1;s:4:"edit";i:1;s:6:"delete";i:1;}}',
            ];
            $role = Role::create($input);

            $data->assignRole($role);
        }
    }
}
