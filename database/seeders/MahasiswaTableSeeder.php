<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user = [
            'nim'          => '212286',
            'name'          => 'akmal rayadil fitrah',
            'username'      => 'akml',
            'password'      => Hash::make('123'),
            'address'      => 'gowa',
            'phone'      => '0987654321',
        ];
        \DB::table('mahasiswas')->insert($default_user);
    }
}
