<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fill users table
        User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('admin')]);
        User::create(['name' => 'Reviewer', 'email' => 'reviewer@example.com', 'password' => bcrypt('reviewer')]);
        User::create(['name' => 'Michael', 'email' => 'michael@example.com', 'password' => bcrypt('michael')]);
    }
}
