@extends('layouts.app')

@section('content')
@if( session('user_role') == 2)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reviewer Dashboard</div>

                <div class="panel-body">
                    <?php
                    // just route
                    // $restaurant_id = 1; // {restaurant_id} dynamically passed when user goes to a restaurnt and presses write review. store in session?
                    $reviewer_id = Auth::user()->id; // {reviewer_id}
                    $form_url = '/addReview';
                    if (isset($restaurant_id))
                    {
                        $form_url = "/addReview/".$restaurant_id."/reviewer/".$reviewer_id;
                    }
                    $add_review_form_options = ['url' => $form_url,'class'=>'col-md-12', 'id'=>'add_review_form', 'style'=>'border:solid gray 1px'];
                    $text_options = ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true];
                    $content_label_options = ['id' => 'content', 'description' => 'Content: '];

                    /*
                        Form::label('id', 'Description');
                        Form::label('id', 'Description', array('class' => 'foo'));
                        Form::text('name');
                        Form::text('name', $value);
                        Form::text('name', $value, array('class' => 'name'));
                    */
                    ?>
                    @if(session('added_review_success_message'))
                    <div class="success">
                        <p> {{ session('added_review_success_message') }} </p>
                        <p><a href="{{ url('/restaurants') }}">Write another review</a> for a different restaurant or go back to <a href="{{ url('/')}}">home</a></p>
                    </div>
                    @else
                        {!! Form::open($add_review_form_options) !!}


                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('tagline', 'Tagline: ' ) !!}
                                {!! Form::text('tagline', '', $text_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label($content_label_options['id'], $content_label_options['description'] ) !!}
                                {!! Form::textarea('content', '', $text_options) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('rating', 'Rating: ' ) !!}
                                {!! Form::select('rating', 
                                    [1=>'☆', 2=>'☆☆', 3=>'☆☆☆', 4=>'☆☆☆☆', 5=>'☆☆☆☆☆'], 
                                    5, 
                                    $text_options) 
                                !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                </br>
                                {!! Form::submit('submit form',['class'=>'btn-primary']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                </br>
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


