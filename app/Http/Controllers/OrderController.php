<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class OrderController extends Controller {
   // methods for the controller go in the class body
   // only PUBLIC methods should be wired to routes


//routes/web.php
//Route::get('order/{id}', 'OrderController@viewOrder');
   public function viewOrder($id) {
        return "This route displays the information for order number ${id}";
    }
}

// no PHP closing tag for controller classes (or really anything in Laravel)
