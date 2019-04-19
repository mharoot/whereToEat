<?php

use Illuminate\Database\Seeder;

class RestaurantMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |-----------------------------------------------------------------------
        |                           In n Out's menu
        |-----------------------------------------------------------------------
        */
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 1, 
            'item_title' => '#1 Combo', 
            'item_description' => 'Double-Double', 
            'item_price' => 6.70
            ] 
        );
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 1, 
            'item_title' => '#2 Combo', 
            'item_description' => 'Cheeseburger', 
            'item_price' => 5.65
            ] 
        );
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 1, 
            'item_title' => '#3 Combo', 
            'item_description' => 'Hamburger', 
            'item_price' => 5.35
            ] 
        );

        /*
        |-----------------------------------------------------------------------
        |                           Burger king's menu
        |-----------------------------------------------------------------------
        */
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 2, 
            'item_title' => '#1 Combo', 
            'item_description' => 'Double-Whopper', 
            'item_price' => 5.50
            ] 
        );
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 2, 
            'item_title' => '#2 Combo', 
            'item_description' => 'Whopper', 
            'item_price' => 4.30
            ] 
        );
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 2, 
            'item_title' => 'Kid\'s Meal Combo', 
            'item_description' => 'Jr-Cheeseburger (comes with play toy)', 
            'item_price' => 5.00
            ] 
        );

        /*
        |-----------------------------------------------------------------------
        |                           Panda Express's menu
        |-----------------------------------------------------------------------
        */
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 3, 
            'item_title' => '#1 Combo', 
            'item_description' => 'Any 1 Side & 2 Entrees', 
            'item_price' => 6.80
            ] 
        );
        DB::table('restaurant_menu')->insert(
            [
            'restaurant_id' => 3, 
            'item_title' => '#2 Combo', 
            'item_description' => 'Any 1 Side & 3 Entrees', 
            'item_price' => 8.30
            ] 
        );


    }
}
