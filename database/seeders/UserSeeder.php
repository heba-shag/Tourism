<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'adminH@gmail.com',
               'role'=>1,
               'password'=> bcrypt('12345678'),
            ],
            ];
    
            foreach ($users as $key => $user) {
                User::create($user);
            }
    }
}
