<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'roles';


  /**
    *--------------------------------------------------------------------------
    *          Indicates if the model should be timestamped.
    *--------------------------------------------------------------------------
    * By default, Eloquent expects created_at and updated_at columns to exist 
    * on your tables. If you do not wish to have these columns automatically 
    * managed by Eloquent, set the $timestamps property on your model to false:
    *
    * @var bool
    */
    public $timestamps = true;


  /**
    * Only these properties can be mass-assigned.  You will need to define a 
    * fillable array for every model class you create. Without it, your fields 
    * will not be assigned a value and will attempt to use whatever default 
    * values may have been specified for the columns when the bound table was 
    * created. https://laravel.com/docs/5.4/eloquent#eloquent-model-conventions
    *
    * @var assoc array
    */
    protected $fillable = ['name'];


   
   

}