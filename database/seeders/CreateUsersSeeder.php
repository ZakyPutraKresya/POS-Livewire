<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'username'=>'admin',
               'email'=>'admin@kasir.com',
                'role'=>'admin',
               'password'=> Hash::make('admin'),
            ],
            [
               'name'=>'kasir',
               'username'=>'kasir',
               'email'=>'kasir@kasir.com',
                'role'=>'kasir',
               'password'=> Hash::make('kasir'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
