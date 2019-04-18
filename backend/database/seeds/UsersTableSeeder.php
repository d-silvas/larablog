<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'a@b.c')->first();

        if(!$user) {
            User::create([
                'name' => 'master',
                'email' => 'a@b.c',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'about' => 'Better don\'t ask'
            ]);
        }
    }
}
