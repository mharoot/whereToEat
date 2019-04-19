@extends('layouts.app')
<?php
$form_options = ['url' => '/editRestaurant/'.$restaurant['id'],'class'=>'col-md-12', 'id'=>'edit_restaurant_form', 'style'=>'border:solid gray 1px'];
$field_options = ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true];
$restaurant_name_label_options = ['id' => 'restaurant_name', 'description' => 'Restaurant Name: '];
$website_field_options = ['class'=> 'form-control', 'autofocus'=>true];
?>
@section('content')
@if( session('user_role') == 1)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                <h1> Edit Restaurant </h1>
                    @if(session('added_restaurant_success_message'))
                    <div class="success">
                        <p> {{ session('added_restaurant_success_message') }} </p>
                        <p><a href="{{ url('/restaurants') }}">Edit another restaurant</a> or go back to <a href="{{ url('/home')}}">Admin Panel</a></p>
                    </div>
                    @else
                        {!! Form::open($form_options) !!}
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label($restaurant_name_label_options['id'], $restaurant_name_label_options['description'] ) !!}
                                {!! Form::text('restaurant_name', $restaurant['restaurant_name'], $field_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('street_address', 'Street Address: ' ) !!}
                                {!! Form::text('street_address', $restaurant['street_address'], $field_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('city', 'City: ' ) !!}
                                {!! Form::text('city', $restaurant['city'], $field_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('state', 'State: ' ) !!}
                                {!! Form::text('state', $restaurant['state'], $field_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('website', 'Website: ' ) !!}
                                {!! Form::text('website', $restaurant['website'], $website_field_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::submit('submit form',['class'=>'btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <script type="text/javascript">
        window.location = "{{ url('/') }}";
    </script>
@endif
@endsection


