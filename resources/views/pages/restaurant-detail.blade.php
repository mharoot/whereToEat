@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Restaurant Detail</h1></div>
                <div class="panel-body">
                    <?php 
                        // TO DO: figureout how to color fraction of stars otherwise leaving ceiling of average_rating method
                        $review_count = count($restaurant_reviews);
                        $total_stars = 0;
                        $average_rating = 0;
                        if ($review_count > 0) {
                            for ($i = 0; $i < $review_count; $i++) {
                                $total_stars += $restaurant_reviews[$i]['rating'];
                            }
                            
                            $average_rating = $total_stars/$review_count;
                        }
                        
                    ?>
                    <?php
                            $id = $restaurant['id'] - 1;
                            $days = null;
                            if ( count($operating_hours)) {
                                $operating_hours =  $operating_hours[$id];//isset($operating_hours[$id]) ? $operating_hours[$id]: $operating_hours;

                                $days = [ 
                                   'monday' => createDayHoursString( $operating_hours['monday']) 
                                ,  'tuesday' => createDayHoursString( $operating_hours['tuesday']) 
                                ,  'wednesday' => createDayHoursString( $operating_hours['wednesday']) 
                                ,  'thursday' => createDayHoursString( $operating_hours['thursday'])  
                                ,  'friday' => createDayHoursString( $operating_hours['friday'])  
                                ,  'saturday' => createDayHoursString( $operating_hours['saturday'])  
                                ,  'sunday' => createDayHoursString( $operating_hours['sunday'])  
                                ];
                            }
                            function createDayHoursString($day) {
                                if (isset($day)) {
                                    $day = explode(',', $day);
                                    $open = $day[0];
                                    $close= $day[1];
                                    return $open." to ".$close;
                                }
                                return "CLOSED";
                            }
                    ?>
                    @if (session('user_role') == 1)
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn-primary"> <a class="btn-primary" href="{{ url('/editRestaurantForm/'.$restaurant['id'])}}">Edit Restaurant</a> </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn-primary"> <a class="btn-primary" href="{{ url('/addOperatingHours/'.$restaurant['id'])}}">+ Add Operating Hours</a> </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn-primary"> <a class="btn-primary" href="{{ url('/addMenuItems/'.$restaurant['id'])}}">+ Add Menu Items</a> </button>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="container"/>
                        <div class="row">
                        @switch($average_rating)
                            @case( $average_rating === '0')
                                <h4> Not yet rated. </h4>
                            @breakswitch
                            @case( $average_rating == 1 )
                                <h4> Bad Restaurant </h4>
                                <h5> Average Rating out of {{ $review_count }} <h5>
                                <p>☆</p>
                            @breakswitch
                            @case( 1 < $average_rating  && $average_rating <= 2)
                                <h4> Ok Restaurant </h4>
                                <h5> Average Rating out of {{ $review_count }} <h5>
                                <p>☆☆</p>
                            @breakswitch
                            @case( 2 < $average_rating  && $average_rating <= 3)
                                <h4> Good Restaurant </h4>
                                <h5> Average Rating out of {{ $review_count }} <h5>
                                <p>☆☆☆</p>
                            @breakswitch
                            @case( 3 < $average_rating  && $average_rating <= 4)
                                <h4> Great Restaurant </h4>
                                <h5> Average Rating out of {{ $review_count }} <h5>
                                <p>☆☆☆☆</p>
                            @breakswitch
                            @case( 4 < $average_rating  && $average_rating <= 5)
                                <h4> Perfect Restaurant </h4>
                                <h5> Average Rating out of {{ $review_count }} <h5>
                                <p>☆☆☆☆☆</p>
                            @breakswitch

                        @endswitch
                        </div>
                        </br>                     
                        @if( session('user_role') == 2)
                            <div class="row">
                                <button class="btn-success"> <a class="btn-success" href="{{url('/addReview/'.$restaurant['id'])}}">Write Review</a> </button>
                            </div>
                            </br>
                        @endif
                        <div class="row">
                            <h5> Restaurant Information <h5>
                            <p> Address </p> 
                            <p>{{ $restaurant['street_address'] }}</p>
                            <p>{{ $restaurant['city'] }}, {{ $restaurant['state'] }}</p>
                        </div>
                        </br>
                        <div class="row">
                            <h5> Website <h5>
                            @if ($restaurant['website'])
                                <a href="{{ $restaurant['website'] }}">{{ $restaurant['website'] }}</a>
                            @else
                                <p>Restaurant website is unavailable.</p>
                            @endif
                        </div>
                        </br>
                        <div class="row">
                            <h5> Operating Hours <h5>
                            @if (count($days)) 
                            <p><strong>Monday: </strong>{{$days['monday']}}</p>
                            <p><strong>Tuesday: </strong>{{$days['tuesday']}}</p>
                            <p><strong>Wednesday: </strong>{{$days['wednesday']}}</p>
                            <p><strong>Thursday: </strong>{{$days['thursday']}}</p>
                            <p><strong>Friday: </strong>{{$days['friday']}}</p>
                            <p><strong>Saturday: </strong>{{$days['saturday']}}</p>
                            <p><strong>Sunday: </strong>{{$days['sunday']}}</p>
                            @else
                            <p> Never open. </p>
                            @endif
                        </div>
                        </br>
                        <div class="row">
                            <h5> Menu <h5>

                            @if ( null !== $restaurant_menu )
                            @foreach ($restaurant_menu as $item)
                                <p> <strong>{{ $item['item_title'] }}</strong> </p>
                                <p> <strong>Price: </strong>{{ $item['item_price'] }} </p>
                                <p> <strong>Description: </strong>{{ $item['item_description'] }} </p>
                                </br>
                            @endforeach
                            @else
                                <p> No menu. </p>
                            @endif
                        </div>
                        </br>
                        <div class="row">
                            <h5> Reviews <h5>
                            @if (count($restaurant_reviews) )
                            @foreach ($restaurant_reviews as $review)
                                <p> <strong>{{ $review['tagline'] }}</strong> </p>
                                <p> 
                                    <strong>Rating: </strong> 
                                    @for ($i = 0; $i < $review['rating']; $i++)
                                        ☆
                                    @endfor
                                </p>
                                <p> <strong>Review: </strong>{{ $review['content'] }} </p>
                                </br>
                            @endforeach
                            @else
                                <p> no reviews written yet. </p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection