<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'role'      =>  'admin',
            'name'      =>  'darinel',
            'email'     =>  'darinelcigarroa97@gmail.com',
            'password'  =>  bcrypt('123123'),
        ]);

        DB::table('users')->insert([
            'name'      =>  'darwin',
            'email'     =>  'darwin@gmail.com',
            'password'  =>  bcrypt('123123'),
        ]);
    }
}
