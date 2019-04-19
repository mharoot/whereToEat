@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Restaurants</h1></div>
                <div class="panel-body">
                @foreach($restaurants as $restaurant)
                    <h4> {{ $restaurant['restaurant_name'] }} </h4>
                    <p> Located in {{ $restaurant['state'] }} </p>
                    <button class="btn-primary">
                        <a class="btn-primary" href="{{ url('restaurant-detail/'.$restaurant['id']) }}"> View Restaurant Information </a>
                    </button>
                    </br>
                @endforeach
                </div>
                <div class="panel-footer">
                    {{ $restaurants->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection