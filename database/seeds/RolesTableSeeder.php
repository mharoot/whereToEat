<?php

use Illuminate\Database\Seeder;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fill roles table
        DB::table('roles')->insert(
            ['name' => 'admin']
        );
        DB::table('roles')->insert(
            ['name' => 'reviewer']
        );

    }
}
