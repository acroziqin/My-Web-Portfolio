<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Achmad Choirur Roziqin',
            'username' => 'acroziqin',
            'password' => bcrypt('password'),
            'email' => 'achmadchoirurroziqin@gmail.com',
        ]);
    }
}
