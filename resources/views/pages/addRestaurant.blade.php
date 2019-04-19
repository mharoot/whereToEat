@extends('layouts.app')

@section('content')
@if( session('user_role') == 1)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <?php
                    // just route
                    $add_restaurant_form_options = ['url' => '/addRestaurant','class'=>'col-md-12', 'id'=>'add_restaurant_form', 'style'=>'border:solid gray 1px'];
                    $text_options = ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true];
                    $restaurant_name_label_options = ['id' => 'restaurant_name', 'description' => 'Restaurant Name: '];

                    /*
                        Form::label('id', 'Description');
                        Form::label('id', 'Description', array('class' => 'foo'));
                        Form::text('name');
                        Form::text('name', $value);
                        Form::text('name', $value, array('class' => 'name'));
                    */
                    ?>
                    @if(session('added_restaurant_success_message'))
                    <div class="success">
                        <p> {{ session('added_restaurant_success_message') }} </p>
                        <p><a href="{{ url('/addRestaurantForm') }}">Add another restaurant</a> or go back to <a href="{{ url('/home')}}">Admin Panel</a></p>
                    </div>
                    @else
                        {!! Form::open($add_restaurant_form_options) !!}
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label($restaurant_name_label_options['id'], $restaurant_name_label_options['description'] ) !!}
                                {!! Form::text('restaurant_name', '', $text_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('street_address', 'Street Address: ' ) !!}
                                {!! Form::text('street_address', '', $text_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('city', 'City: ' ) !!}
                                {!! Form::text('city', '', $text_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('state', 'State: ' ) !!}
                                {!! Form::text('state', '', $text_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('website', 'Website: ' ) !!}
                                {!! Form::text('website', '', ['class'=> 'form-control', 'autofocus'=>true]) !!}
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


