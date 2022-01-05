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
        //Use this user for login as admin
        User::create(['name' => 'Rat', 'email' => 'rat@mail.com', 'password' => bcrypt('a'), 'active' => 1]);
        User::create(['name' => 'Talha', 'email' => 'talhaqc@gmail.com', 'password' => bcrypt('a'), 'active' => 1]);
        User::create(['name' => 'Mas', 'email' => 'mrsiddiki@gmail.com', 'password' => bcrypt('a'), 'active' => 1]);
        User::create(['name' => 'Rabbit', 'email' => 'rabbithassan@gmail.com', 'password' => bcrypt('a'), 'active' => 1]);
        User::create(['name' => 'demo', 'email' => 'demo@mail.com', 'password' => bcrypt('a'), 'active' => 1]);
        //creating 10 test users
        // factory(User::class,10)->create();
    }
}
