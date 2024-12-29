<?php

namespace Database\Seeders;

use Illuminate\Database\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            [
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@hotmail.com',
                'password'=> Hash::make('111'),
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                'name'=>'Agent',
                'username'=>'agent',
                'email'=>'agent@hotmail.com',
                'password'=> Hash::make('111'),
                'role'=>'agent',
                'status'=>'active'
            ],
            [
                'name'=>'User',
                'username'=>'user',
                'email'=>'user@hotmail.com',
                'password'=> Hash::make('111'),
                'role'=>'user',
                'status'=>'active'
            ]

        ]);
    }
}
