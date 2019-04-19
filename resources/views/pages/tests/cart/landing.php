<?php 
    echo 'passed '.$userId.' landing.php: Welcome to the landing page! From within resources/views/pages/';



/*
|-------------------------------------------------------------------------------
| Named routes allow you to specify a shorthand key for your URL
|-------------------------------------------------------------------------------
|
| in routes/web.php we have written the following code:
|
|    Route::post('users/create', ['as' => 'user.create', function() {
|        // Route::post() responds to the HTTP POST method
|    return 'This will create a new user in the database';
|    }]);
|
|
|-------------------------------------------------------------------------------
| Then you can use the short hand key as we did below (in a different file of 
| course), the absolute URL for the route can be retrieved for use elsewhere 
| with the route() helper:
|-------------------------------------------------------------------------------
*/
$url = route('user.create'); // use when generating URLs and redirects
?>




<form method="POST" action="<?php echo $url;?>">
<?php 
/*
|-------------------------------------------------------------------------------
| CSRF Protection
|-------------------------------------------------------------------------------
| Any HTML forms pointing to POST, PUT, or DELETE routes that are defined in the
| web routes file should include a CSRF token field. Otherwise, the request will 
| be rejected. You can read more about CSRF protection in the CSRF documentation 
| https://laravel.com/docs/5.4/csrf :
|
*/
    echo csrf_field(); // output is something like: <input type="hidden" name="_token" value="3IkRgu4CANdveT2RlTnSZIZavpWPTsJWIzUMFbhd">
    //manual implementation of this found @: http://stackoverflow.com/questions/6287903/how-to-properly-add-csrf-token-using-php
    

?>
    <input type="submit" value="Named Routes"> </input>
</form>





</br></br>


<?php
/*
|-------------------------------------------------------------------------------
| Named Controller Routes
|-------------------------------------------------------------------------------
| Allow you to specify a shorthand key for your URL to use in different files
| public functions:
|
| in routes/web.php we have written the following code:
|
|   Route::get('skeleton', [
|      'uses' => 'CartController@display',
|      'as'   => 'skeleton.view',
|   ]);
|-------------------------------------------------------------------------------
| Then you can use the short hand key as we did below (in a different file of 
| course), the absolute URL for the route can be retrieved for use elsewhere 
| with the route() helper:
|-------------------------------------------------------------------------------
*/

$url = route('skeleton.view'); // use with creating URLs and redirects
?>

<form method="GET" action="<?php echo $url;?>">
<?php 
/*
|-------------------------------------------------------------------------------
| No CSRF Protection Needed for GET requests
|-------------------------------------------------------------------------------
| Any HTML forms pointing to POST, PUT, or DELETE routes that are defined in the
| web routes file should include a CSRF token field. Otherwise, the request will 
| be rejected.
|
*/
?>
    <input type="submit" value="Named Controller Routes"> </input>
</form>


</br></br>
<?php

$url = route('order.view', ['id' => 5]); // use with creating URLs and redirects
?>

<form method="GET" action="<?php echo $url;?>">
<?php 
/*
|-------------------------------------------------------------------------------
| No CSRF Protection Needed for GET requests
|-------------------------------------------------------------------------------
| Any HTML forms pointing to POST, PUT, or DELETE routes that are defined in the
| web routes file should include a CSRF token field. Otherwise, the request will 
| be rejected.
|
*/
?>
    <input type="submit" value="Named Controller Routes with Parameters"> </input>
</form>


