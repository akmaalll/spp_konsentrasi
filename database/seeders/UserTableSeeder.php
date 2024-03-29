<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user = [
            'name'          => 'akmal',
            'username'      => 'admin',
            'password'      => Hash::make('admin'),
            'created_at'    => new \DateTime
        ];
        \DB::table('users')->insert($default_user);
    }
}
