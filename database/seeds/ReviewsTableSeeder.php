<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // populating reviews table
        DB::table('reviews')->insert(
            ['reviewer_id' => 2, 'restaurant_id' => 1, 'rating' => 5, 'tagline' => 'So worth the wait!', 'content' => 'Although the line was long, In n Out has the best burgers on EARTH!'] // 'admin'
        );
        DB::table('reviews')->insert(
            ['reviewer_id' => 3, 'restaurant_id' => 1, 'rating' => 5, 'tagline' => 'Thats one of our Hamburgers!', 'content' => 'God this place is so amazing I wish I could give it 6 out of 5 stars!'] // 'admin'
        );

        DB::table('reviews')->insert(
            ['reviewer_id' => 2, 'restaurant_id' => 2, 'rating' => 2, 'tagline' => 'Kind of had a gross experience.', 'content' => 'Found some hair in my food and also had some stuck to my teeth.  Never going back agian!'] // 'admin'
        );
        DB::table('reviews')->insert(
            ['reviewer_id' => 3, 'restaurant_id' => 2, 'rating' => 2, 'tagline' => 'Can you say EW!?.', 'content' => 'Saw rat poop on the first table I sat at.  It safe to say I will never eat there again... -_-'] // 'admin'
        );

        DB::table('reviews')->insert(
            ['reviewer_id' => 2, 'restaurant_id' => 3, 'rating' => 4, 'tagline' => 'Love the fortune cookies', 'content' => 'I always love getting my fotune told in those little panda express cookies.  I have so much fun!'] // 'admin'
        );

    }
}
