<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OperatingHoursSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(RestaurantMenuSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UserTableSeeder::class);

    }
}
