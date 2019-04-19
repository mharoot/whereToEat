<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    //
    protected $table = 'operating_hours';
	protected $fillable = ['restaurant_id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    public $timestamps = false; // laravel by default uses timestamps
    protected $primaryKey = 'restaurant_id';
}
