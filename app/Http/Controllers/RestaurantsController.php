<?php
namespace App\Http\Controllers;       // name of directory this class is in
use App\Http\Controllers\Controller;  // this class extends Controller
use App\Restaurant;
/*
|-------------------------------------------------------------------------------
| The Request class:
|-------------------------------------------------------------------------------
|
| In order to retrieve data submitted from a form we first have to tell PHP
| we wish to use the Request class that exists outside of our current 
| controller namespace. We place after the namespace but before the class 
| definition:
|
*/
use Illuminate\Http\Request;
use App\OperatingHour;
class RestaurantsController extends Controller {

    public function index() {
        // https://laravel.com/docs/4.2/pagination
        // common mistake is Restaurant::all()->paginate(2).. by default Restaurant will return all just paginate it
        return view('pages.restaurants', ['restaurants' => Restaurant::paginate(2)]);
    }

    public function getRestaurantDetail($id) {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant_menu = $restaurant->menu()->get();
        $restaurant_reviews = $restaurant->reviews()->get();
        $operating_hours = OperatingHour::get()->where('restaurant_id', '=', $id);
        return view('pages.restaurant-detail', 
        [
            'restaurant' => $restaurant, 
            'restaurant_menu' => $restaurant_menu, 
            'restaurant_reviews' => $restaurant_reviews,
            'operating_hours' => $operating_hours
        ]);
        //debug using return below
        // return [
        //     'restaurant' => $restaurant, 
        //     'restaurant_menu' => $restaurant_menu, 
        //     'restaurant_reviews' => $restaurant_reviews,
        //     'operating_hours' => $operating_hours
        // ];
        //return $operating_hours['1']['restaurant_id'];
    }




    // test functions to be deleted later when app is completed
    public function getAllRestaurants() {
        return view('pages.test.restaurants', ['restaurants'=>Restaurant::all()]);
    }

    public function getMenu($restaurant_id) {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $restaurant_menu = $restaurant->restaurantMenu()->get();
        return view('pages.test.restaurant-menu', ['restaurant' => $restaurant, 'restaurant_menu' => $restaurant_menu]);

    }



}
