<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // populating restaurants table

        DB::table('restaurants')->insert(
            ['restaurant_name' => 'In n Out', 'street_address' => '6264 Foothill Blvd', 'city' => 'Tujunga', 'state' => 'CA', 'website' => 'http://www.in-n-out.com/'] 
        );

        DB::table('restaurants')->insert(
            ['restaurant_name' => 'Burger King','street_address' => '8992 Helendale Ave', 'city' => 'Tujunga', 'state' => 'CA', 'website' => 'http://www.bk.com/'] 
        );

        DB::table('restaurants')->insert(
            ['restaurant_name' => 'Panda Express','street_address' => '1320 Montrose Ave', 'city' => 'La Crescenta', 'state' => 'CA', 'website' => 'http://www.pandaexpress.com/'] 
        );
    }
}
