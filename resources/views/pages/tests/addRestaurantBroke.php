
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <?php
                    // just route
                    $add_restaurant_form_options = ['route' => 'addRestaurant','class'=>'col-md-12', 'id'=>'add_restaurant_form', 'style'=>'border:solid gray 1px'];
                    $text_options = ['class'=> 'form-control', 'required'=>'required', 'autofocus'=>'autofocus'];
                    $restaurant_name_label_options = ['id' => 'restaurant_name', 'description' => 'Restaurant Name: '];

                    /*
                        Form::label('id', 'Description');
                        Form::label('id', 'Description', array('class' => 'foo'));
                        Form::text('name');
                        Form::text('name', $value);
                        Form::text('name', $value, array('class' => 'name'));
                    */
                    ?>

                    {!! Form::open($add_restaurant_form_options) !!}
                    {!! Form::text('restaurant_name', '', $text_options) !!}
                    {!! Form::text('street_address' ) !!}
                    {!! Form::text('city' ) !!}
                    {!! Form::text('state') !!}
                    {!! Form::text('website') !!}
                    {!! Form::submit('submit form') !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
