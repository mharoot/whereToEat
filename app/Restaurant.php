<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $table = 'restaurants';
	protected $fillable = ['restaurant_name', 'street_address', 'city', 'state', 'website'];

	public function menu() 
	{
		/*
		|-------------------------------------------------------------------------------
		| one-to-one relationship to connect from the (restaurants table id column) to 
		| the ( restaurant_menu table id )
		|-------------------------------------------------------------------------------
		*/
		return $this->hasOne('App\RestaurantMenu');
    }

	public function reviews() 
	{
		/*
		|-------------------------------------------------------------------------------
		| one-to-one relationship to connect from the (restaurants table id column) to 
		| the ( restaurant_menu table id )
		|-------------------------------------------------------------------------------
		*/
		return $this->hasOne('App\Review');
    }

	public function operating_hours() {
		return $this->hasOne('App\OperatingHour');
	}

}