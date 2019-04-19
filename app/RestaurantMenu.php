<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    protected $table = 'restaurant_menu';
	protected $fillable = ['restaurant_id', 'item_title', 'item_description', 'item_price'];
    public $timestamps = false; // laravel by default uses timestamps
    protected $primaryKey = 'restaurant_id';
}
