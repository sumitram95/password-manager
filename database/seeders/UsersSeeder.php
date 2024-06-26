<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
        ]);
        $user->userInfo()->create([
            'f_name' => "new",
            'l_name' => "Admin",
        ]);
        $user->assignRole('Admin');
    }
}
