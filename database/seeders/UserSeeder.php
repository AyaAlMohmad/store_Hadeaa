<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
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
        // DB::table('users')->truncate();
        User::create([
          
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'gender'=>'male',
            'phone'=>'095555553',
            'password' => Hash::make('Admin.12312111'),
        ]);
        
        
        User::create([
          

            'name' => 'aya',
            'email' => 'aya@gmail.com',
            'gender'=>'male',
            'phone'=>'095555553',
            'password' => Hash::make('Aya.12312111'),
        ]);
    }
}
