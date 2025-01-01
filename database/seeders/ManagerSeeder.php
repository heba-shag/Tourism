<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
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
                'name'=>'Manager User',
                'email'=>'manager@gmail.com',
                'role'=>2,
                'password'=> bcrypt('123456789'),
             ],
            ];
    
            foreach ($users as $key => $user) {
                User::create($user);
            }
    }
}
