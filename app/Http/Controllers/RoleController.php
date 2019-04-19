<?php
/*
The all() method on a model class can be used to retrieve a Collection instance containing all rows from the
model’s bound table:



$roles = Role::all();
$allUsers = User::all();


return $allUsers;




You can execute the above in a controller method, making sure to add the use statement for the model’s absolute
class name (use App\User).
*/


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller {
   // methods for the controller go in the class body
   // only PUBLIC methods should be wired to routes



   /*
    It's fairly simple to wire routes in the routes file to methods in the controller files:
    routes/web.php
    Route::get('getAllRows', 'RoleController@getAllRows');
   */
   public function getAllRows() {
       $roles = Role::all();
       return view('pages.cart.roles', ['roles' => $roles]);
   }

   public function findRoleOne() {
       $roles = Role::find(1);
       return view('pages.cart.role_one', ['role_one' => $roles]);
   }
}