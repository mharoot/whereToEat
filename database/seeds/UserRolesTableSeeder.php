<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        DB::table('role_user')->insert(
            ['user_id' => 1, 'role_id' => 1] // 'admin'
        );
        DB::table('role_user')->insert(
            ['user_id' => 2, 'role_id' => 2] // 'reviewer'
        );
        DB::table('role_user')->insert(
            ['user_id' => 3, 'role_id' => 2] // 'reviewer'
        );
    }
}
