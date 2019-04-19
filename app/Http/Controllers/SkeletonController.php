<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class SkeletonController extends Controller {
   // methods for the controller go in the class body
   // only PUBLIC methods should be wired to routes



   /*
    It's fairly simple to wire routes in the routes file to methods in the controller files:
    routes/web.php
    Route::get('skeleton', 'SkeletonController@display');
   */
   public function display() {
       return "SkeletonController@display: hello world!";
   }
}

// no PHP closing tag for controller classes (or really anything in Laravel)
