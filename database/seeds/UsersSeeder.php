<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new \App\User;
        $users->name = 'Admin1';
        $users->email = 'admin1@gmail.com';
        $users->password = bcrypt('admin1');
        $users->level = 'ADMIN';
        $users->save();
    }
}
