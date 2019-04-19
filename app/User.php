<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];





    /*
        MANY TO MANY RELATIONSHIP
    |-----------------|     |---------------|     |---------------|
    |    users        |     |   roles       |     |   role_user   |
    |-----|-----------|     |-----|---------|     |-------|-------|
    |id   |name       |     |id   |name     |     |user_id|role_id|
    |-----|-----------|     |-----|---------|     |-------|-------|
    |1    |Admin      |     |1    |Admin    |     |1      |1      |
    |2    |Reviewer   |     |2    |Reviewer |     |2      |2      |
    |3    |Michael    |     |---------------|     |3      |2      |
    |-----------------|                           |---------------|
    With the three previous tables, we would have two models:
        User and Role, connected with a pivot table role_user. 

    They have a many-to-many relationship: 
        one user can have multiple roles and the same roles can be shared among users. We can
        create a relationship method for roles in the User model:

    */


    // returns a Collection


    public function roles() {
    /*
    |-------------------------------------------------------------------------------
    | many-to-many relationship to connect from the id column in the users table to 
    | the user_id column in the users_role table; from there a matching role is 
    | connected from the id column in the roles table to the role_id column in the 
    | users_role table
    |-------------------------------------------------------------------------------
    */

    /*
    In addition to customizing the name of the joining table, you may also customize the
    column names of the keys on the table by passing additional arguments to the belongsToMany
    method. The third argument is the foreign key name of the model on which you are defining
    the relationship, while the fourth argument is the foreign key name of the model that 
    you are joining to:
    */
    return $this->belongsToMany('App\Role');


    }


    public function role_user() {
    /*
    |-------------------------------------------------------------------------------
    | many-to-many relationship to connect from the id column in the users table to 
    | the user_id column in the users_role table; from there a matching role is 
    | connected from the id column in the roles table to the role_id column in the 
    | users_role table
    |-------------------------------------------------------------------------------
    */

    /*
    In addition to customizing the name of the joining table, you may also customize the
    column names of the keys on the table by passing additional arguments to the belongsToMany
    method. The third argument is the foreign key name of the model on which you are defining
    the relationship, while the fourth argument is the foreign key name of the model that 
    you are joining to:
    */
    return $this->hasOne('App\RoleUser');


    }


}
