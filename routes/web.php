<?php

/*
|--------------------------------------------------------------------------
| General
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/', function() { // first page
    return view('pages.index');
});
Route::get('/home', 'HomeController@index'); // user logged in dashboard



/*
|--------------------------------------------------------------------------
| Restaurants
|--------------------------------------------------------------------------
*/
Route::get('/restaurants', [
    'as'    => 'restaurants', 
    'uses'  => 'RestaurantsController@index'
]);
Route::get('/restaurant-detail/{id}', [
    // 'as'    => 'restaurant-detail-{id}', // is this legal?
    'uses'  => 'RestaurantsController@getRestaurantDetail'
]);
Route::get('/restaurant-menu/{id}', 'RestaurantsController@getMenu');



/*
|--------------------------------------------------------------------------
| Reviewers
|--------------------------------------------------------------------------
*/
Route::get('/addReview', 
    function () {
        return view('pages.addReview');

    }
);
Route::get('/addReview/{restaurant_id}', 
    function ($restaurant_id) {
        return view('pages.addReview', [ 'restaurant_id' => $restaurant_id]);
    }
);
Route::post('/addReview/{restaurant_id}/reviewer/{reviewer_id}', 'ReviewerController@addReview');
Route::get('/changePassword', 'ReviewerController@changePassword');
Route::get('/myReviews', 'ReviewerController@myReviews');

/*
|--------------------------------------------------------------------------
| Admins
|--------------------------------------------------------------------------
*/
Route::get('/addMenuItems/{restaurant_id}', 'AdminController@addMenuItemsForm');
Route::post('/addMenuItems/{restaurant_id}', 'AdminController@addMenuItems');
Route::post('/addOperatingHours/{restaurant_id}', 'AdminController@addOperatingHours');
Route::get('/addOperatingHours/{restaurant_id}', 'AdminController@addOperatingHoursForm');
Route::post('/addRestaurant', ['as'    => 'addRestaurant', 'uses'  => 'AdminController@addRestaurant']);
Route::get('/addRestaurantForm', 'AdminController@addRestaurantForm');
Route::get('/manageUsers', 'AdminController@manageUsersView' );
Route::post('changeUserRole/{user_id}', 'AdminController@changeUserRole');
Route::get('/editRestaurantForm/{restaurant_id}', 'AdminController@editRestaurantForm');
Route::post('/editRestaurant/{restaurant_id}', 'AdminController@editRestaurant');





/*
|--------------------------------------------------------------------------
| Web Routing Tests:
|--------------------------------------------------------------------------
*/

Route::get('tableJoin', 'UserController@tableJoin');
Route::get('getAllRows', 'RoleController@getAllRows');
Route::get('findRoleOne', 'RoleController@findRoleOne');
Route::get('getAllRestaurants', 'RestaurantsController@getAllRestaurants');
Route::get('restaurantMenu/{id}', 'RestaurantsController@getMenu');




/*
|--------------------------------------------------------------------------
| Web Route examples below:
|--------------------------------------------------------------------------
*/

Route::get('landing/{id}', function ($userId) {
    // Route::get() responds to the HTTP GET method
    return view('pages.landing', ['userId' => $userId] );
    // @resources/views/pages/landing.php
});

Route::delete('users/{id}', function($userId) {
   // Route::delete() responds to the HTTP DELETE method 
   return 'This route would delete the user with the ID of '.$userId;// when using blade you can do {{ $userId}}
});

/*
|-------------------------------------------------------------------------------
| Named routes
|-------------------------------------------------------------------------------
| Allow you to specify a shorthand key for your URL to use in different files:
|
*/
Route::post('users/create', ['as' => 'user.create', function() {
    // Route::post() responds to the HTTP POST method
   return 'This will create a new user in the database';
}]);
/*
|-------------------------------------------------------------------------------
| Then you can use the short hand key as we did below (in a different file of 
| course), the absolute URL for the route can be retrieved for use elsewhere 
| with the route() helper:
|-------------------------------------------------------------------------------
|
|   $url = route('user.create'); // use when generating URLs and redirects
|
*/





/*
|-------------------------------------------------------------------------------
| Controller Routes
|-------------------------------------------------------------------------------
|
*/
Route::get('skeleton', 'SkeletonController@display');
/*
|-------------------------------------------------------------------------------
|   Call the public function display adding '/skeleton' to the end of the url.
|-------------------------------------------------------------------------------
|
|-------------------------------------------------------------------------------
| app/Http/Controllers/SkeletonController.php
|-------------------------------------------------------------------------------
|
|    public function display() {
|       return "Hellow World!";
|    }
|
*/




/*
|-------------------------------------------------------------------------------
| Named Controller Routes
|-------------------------------------------------------------------------------
| Allow you to specify a shorthand key for your URL to use in different files
| public functions:
|
*/
Route::get('skeleton', [
   'uses' => 'SkeletonController@display',
   'as'   => 'skeleton.view',
]);
/*
|-------------------------------------------------------------------------------
| Then you can use the short hand key as we did below (in a different file of 
| course), the absolute URL for the route can be retrieved for use elsewhere 
| with the route() helper:
|-------------------------------------------------------------------------------
|
|   $url = route('skeleton.view'); // use with creating URLs and redirects
|
*/





/*
|-------------------------------------------------------------------------------
| Controller Routes with Parameters
|-------------------------------------------------------------------------------
| Allow you to specify pass parameters to controller public functions.
| Controllers can accept route parameters as parameters (using the same names as 
| the route parameters) to their methods:
|
*/
Route::get('order/{id}', 'OrderController@viewOrder');
/*
|-------------------------------------------------------------------------------
| app/Http/Controllers/OrderController.php
|-------------------------------------------------------------------------------
|
|    public function viewOrder($id) {
|       return "This route displays the information for order number ${id}";
|    }
|
*/






/*
|-------------------------------------------------------------------------------
| Named Controller Routes with Parameters
|-------------------------------------------------------------------------------
| Allow you to specify a shorthand key for your URL to use in different files
| public functions with paramters
|
*/
Route::get('order/{id}', [
   'uses' => 'OrderController@viewOrder',
   'as'   => 'order.view'
]);
/*
|-------------------------------------------------------------------------------
| Inside OrderController class the view order function looks like:
|-------------------------------------------------------------------------------
|    public function viewOrder($id) {
|        return "This route displays the information for order number ${id}";
|    }
|
|
|-------------------------------------------------------------------------------
| Using shorthand key in resources/views/pages/landing.php:
|-------------------------------------------------------------------------------
|
|    $url = route('order.view', ['id' => 5]); 
|
*/





/*
|-------------------------------------------------------------------------------
| RESTful Resource Controllers allow us to abstract away some of the explicit 
| route definitions and instead use a consistent naming convention for our CRUD 
| operations in a single controller:
|-------------------------------------------------------------------------------
|
|   Route::resource('user', 'UserController'');
|
|-------------------------------------------------------------------------------
| This gives us the ability to define controller methods that:
|-------------------------------------------------------------------------------
|
|   Show an index of all users in the system
|   Display information about a single user
|   Create a new user in the system (both displays the screen and accepts the input)
|   Modify an existing user in the system (both displays the screen and accepts the input)
|   Delete an existing user in the system (accepts the input)
|
*/





/*
|-------------------------------------------------------------------------------
| Why Views?
|-------------------------------------------------------------------------------
|
| If you want your application to have any visual component whatsoever you’ll 
| need to create views. Views typically accept data from controllers using 
| session data and generated variables, for example.
|
| Views are placed within the resources/views/ directory within your project. 
| Views are retrieved based on dot-notation: subdirectories in the 
| resources/views/ directory are separated by dots. We use the view() helper 
| with dot notation to render the view itself:
|
|-------------------------------------------------------------------------------
| In a route closure or a controller method
|-------------------------------------------------------------------------------
|   return view('pages.cart.additem'); // resources/views/pages/cart/additem.php
|
*/
// Why Views?: Returning view in a route closure example
Route::get('cart/add', function() {
    return view('pages.cart.additem'); // resources/views/pages/cart/additem.php
});







/*
|-------------------------------------------------------------------------------
| Controller Data in a View: Session Data
|-------------------------------------------------------------------------------
|
| A controller method can write data to the session using the session() helper:
|
| app/Http/Controllers/CartController.php
|
|   public function viewCart() {
|       session([‘cart_type’ => ‘Basic Cart’]); // associative array to write
|       return view(‘pages.cart.additem’); // resources/views/pages/cart/additem.php
|   }
|
| resources/views/pages/cart/additem.php
| <?php echo “Received cart type: “ . session(‘cart_type’); ?>
|
*/

// Why Views?: Returning view in a controller method example
Route::get('cart/view', 'CartController@viewCart');


// blade
Route::get('cart/blade/view', 'CartController@viewBladeCart');

Route::get('cart/blade/view/1', [
   'uses' => 'CartController@viewBladeCart',
   'as'   => 'cart.added'
]);

Route::post('cart/add', ['uses' => 'CartController@addItemToCart', 'as' => 'cart.addedItem']);

Route::post('cart/blade/view', ['uses' => 'CartController@orderSubmitted', 'as' => 'cart.submitOrder']);
