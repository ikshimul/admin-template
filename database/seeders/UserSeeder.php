<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'        => 'Inzamamul Karim',
                'email'       => 'ikshimuluits@gmail.com',
                'password'    => bcrypt('123456'),
                'role'        => 'Admin',
            ]
        ];

        foreach ($users as $user) {
            $role = $user['role'];
            unset($user['role']);
            $user = User::updateOrCreate(['email' => $user['email']], $user);

            $user->assignRole($role);
        }
    }
}
