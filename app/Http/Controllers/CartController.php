<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// In order to retrieve data submitted from a form we first have to tell PHP we wish to use the Request 
// class that exists outside of our current controller namespace:
use Illuminate\Http\Request; // place after namespace but before the class definition

class CartController extends Controller {
   public function viewCart() {
       session(['cart_type' => 'Basic Cart']); // associative array to write
       return view('pages.cart.additem'); // resources/views/pages/cart/additem.php
   }

   public function viewBladeCart() {
       session(['cart_type' => 'Basic Cart']); // associative array to write
       return view('pages.cart.additem1'); // resources/views/pages/cart/additem.php
   }

   //Secondly, we need to type-hint the Request object as the first parameter to the controller method that will be receiving the submission data:

    public function addItemToCart(Request $request) {
      // retrieve submitted POST data and add the item ID to the cart
      $itemId = $request->input('item_id'); // input() returns data from the request
      return "You added item number ${itemId} to your cart";
    }

    public function orderSubmitted() {
        return redirect('cart/blade/view')->with('message', 'Thank you for placing your order!');
    }

}
