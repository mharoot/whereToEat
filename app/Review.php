<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //by default $table is plural of class name Reviews so no need to set protected $table = "reviews";

	protected $fillable = ['restaurant_id', 'reviewer_id', 'rating', 'tagline', 'content'];
            
}
