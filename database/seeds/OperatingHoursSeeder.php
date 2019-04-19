<?php

use Illuminate\Database\Seeder;

class OperatingHoursSeeder extends Seeder
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
        |                           In n Out's hours of operation.
        |-----------------------------------------------------------------------
        */
        DB::table('operating_hours')->insert(
            [
                'restaurant_id' => 1, 
                'monday' => '10:00am,1:00am',
                'tuesday' => '10:00am,1:00am',
                'wednesday' => '10:00am,1:00am',
                'thursday' => '10:00am,1:00am',
                'friday' => '10:00am,1:00am',
                'saturday' => '10:00am,1:30am',
                'sunday' => '10:00am,1:00am'
            ] 
        );
        
        /*
        |-----------------------------------------------------------------------
        |                           Burger king's hours of operation.
        |-----------------------------------------------------------------------
        */
        DB::table('operating_hours')->insert(
            [
                'restaurant_id' => 2, 
                'monday' => '10:30am,11:00pm',
                'tuesday' => '10:30am,11:00pm',
                'wednesday' => '10:30am,11:00pm',
                'thursday' => '10:30am,11:00pm',
                'friday' => '10:30am,11:00pm',
                'saturday' => '10:30am,11:30pm',
                'sunday' => '10:30am,11:00pm'
            ] 
        );


        /*
        |-----------------------------------------------------------------------
        |                           Panda Express's hours of operation.
        |-----------------------------------------------------------------------
        */
        DB::table('operating_hours')->insert(
            [
                'restaurant_id' => 3, 
                'monday' => '10:30am,10:00pm',
                'tuesday' => '10:30am,10:00pm',
                'wednesday' => '10:30am,10:00pm',
                'thursday' => '10:30am,10:00pm',
                'friday' => '10:30am,10:00pm',
                'saturday' => '10:30am,10:30pm',
                'sunday' => '10:30am,10:00pm'
            ] 
        );


    }
}
