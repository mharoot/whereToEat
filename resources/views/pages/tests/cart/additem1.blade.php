<?php
/*
@foreach($users as $user)
   <p>User {{ $user->id }} is named {{ $user->name }}</p>
@endforeach





The forelse loop in Blade does not have a direct equivalent in PHP but its use case is very common:

@forelse($cart->items as $item)
   <p>Item {{ $item->id }} is named {{ $item->name }}</p>
@empty
   <p>You do not have anything in your shopping cart</p>
@endforelse

You would usually need to surround a foreach loop within an existence conditional in PHP to achieve the same effect you would get with Blade's forelse construct.

*/


/*
The child view then specifies what layout it is using via the @extends() directive as well as section names
 (using the @section() directive) with content to be loaded into the master layout:

resources/views/pages/cart/additem1.blade.php

{!! Form::open() !!}
{!! Form::open(['url' => url('cart/additem1')]) !!}
{!! Form::open(['route' => 'cart.added']) !!}
{!! Form::open(['method' => 'GET']) !!}
{!! Form::text('username') !!}
{!! Form::textarea('comments') !!}
{!! Form::submit('Submit Form') !!}
{!! Form::close() !!}



when you have the route post set up like this all of the following methods work for form open:
Route::post('cart/add', ['uses' => 'CartController@addItemToCart', 'as' => 'cart.addedItem']);
*/
// both url and route
$arr1 = ['url' => url('cart/add'), 'route' => 'cart.addedItem','class'=>'col-md-12', 'id'=>'arr1_form', 'style'=>'border:solid gray 1px'];

// just route
$arr2 = ['route' => 'cart.addedItem','class'=>'col-md-12', 'id'=>'arr2_form', 'style'=>'border:solid gray 1px'];

//just url
$arr3 = ['url' => url('cart/add'), 'class'=>'col-md-12', 'id'=>'arr3_form', 'style'=>'border:solid gray 1px'];


// just route
$success_submit_form = ['route' => 'cart.submitOrder','class'=>'col-md-12', 'id'=>'success_submit_form', 'style'=>'border:solid gray 1px'];

?>
@extends('layouts.master')

@section('content')
{!! Form::open($success_submit_form) !!}
{!! Form::submit('submit form') !!}
{!! Form::close() !!}
@if(session('message'))
   <div class="success">
           <?php // Echoing out a variable (unsanitized - HTML characters are evaluated as HTML) ?>
      {{ session('message') }}
   </div>
@else
   not set
@endif
<?php // Echoing out a variable (unsanitized - HTML characters are evaluated as HTML) : {!! HTML goes here !!}?>
{!! Form::open($arr3) !!}
{!! Form::text('item_id') !!}
{!! Form::close() !!}






<p>
Before any controls can be added we have to open the form in our Blade view:
This will open a form with the default method (HTTP method) of POST and the default action (URL where the data will be sent) of the current URL.

We can send the form data elsewhere or use a different HTTP method using the parameter array:
</p>
{{ Form::open(array('url' => url('cart/blade/view'), 'route' => 'cart.added', 'method'=>'GET','class'=>'col-md-12', 'id'=>'frmFoo', 'style'=>'border:solid gray 1px')) }}
{!! Form::text('username') !!}
{!! Form::textarea('comments') !!}
{!! Form::submit('Submit Form') !!}
{!! Form::close() !!}

At the end of the form we have to execute the close() method to add the closing tag and exit the code of the form. We should only close the form once we have finished added generating the code for our  input fields; don't close the form and then place more controls outside the form.
   <p>You can add an item to your cart on this page</p>
   <?php
   /*
        Blade provides a shorthand way of echoing out data using curly braces:

        Echoing out a variable (sanitized - HTML is suppressed, albeit in a visual way)
        {{ $type }}

        Echoing out a variable (unsanitized - HTML characters are evaluated as HTML)
        {!! $type !!}

        In most cases we will want to sanitize all data that is being displayed in a Blade view;
        the exception is when we control the contents of a variable and are certain the contents are not malicious.

        If/else conditionals work the way you would think in Blade:

        @if($type == "Basic Cart")
        <p>You are currently using the Basic Cart</p>
        @else
        <p>You are currently using the Advanced Cart</p>
        @endif

        Looks familiar to standard conditionals in PHP, does it not?
        */
        $type = session('cart_type');
        $cart = array();
?>
        @if($type == "Basic Cart")
        <p>You are currently using the Basic Cart</p>
        @else
        <p>You are currently using the Advanced Cart</p>
        @endif


        Looping with for and foreach loops in Blade looks similar to their standard PHP versions:

        @for($i = 0; $i < 10; $i++)
        <p>This is iteration {{ $i }} of the loop</p>
        @endfor

@endsection
