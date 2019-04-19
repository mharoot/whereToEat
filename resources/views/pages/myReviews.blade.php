@extends('layouts.app')

@section('content')
@if( session('user_role') == 2)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reviewer Dashboard</div>
                <div class="panel-body">
                    <h1>My Reviews</h1>
                    <h2>You have {{count($myReviews) }} review(s) available</h2>
                    @foreach( $myReviews as $myReview)
                        <p> <strong>{{ $myReview['tagline'] }}</strong> </p>
                        <p> 
                            <strong>Rating: </strong> 
                            @for ($i = 0; $i < $myReview['rating']; $i++)
                                ☆
                            @endfor
                        </p>
                        <p> <strong>Review: </strong>{{ $myReview['content'] }} </p>
                        <p> <strong>Submitted: </strong> {{ date("F j, Y, g:i a", strtotime( $myReview['created_at']) ) }}</p>
                        </br>
                    @endforeach
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


