<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth; // using Auth class
use App\Role;

class UserController extends Controller {
   // methods for the controller go in the class body
   // only PUBLIC methods should be wired to routes

/*
Route::get('tableJoin', 'UserController@tableJoin');
*/

   
   public function tableJoin() {
        $id =  Auth::id();
        $user = User::find($id);
        $join = $user->roles()->get(); // join is happening just not returning the user info as well.
        $user_role = Role::find($user[0]['pivot']['role_id']);
        return view('pages.cart.rolesJoinUser', ['user' => $user, 'user_role' => $user_role, 'join'=>$join]);
   }


}

// no PHP closing tag for controller classes (or really anything in Laravel)
