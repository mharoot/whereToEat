@extends('layouts.app')
<?php
$form_options = ['class'=>'col-md-12', 'id'=>'add_operating_hours', 'style'=>'border:solid gray 1px'];
$field_options = ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true];
?>
@section('content')
@if( session('user_role') == 1)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                <h1> Add Operating Hours </h1>
                    @if(session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                        {!! Form::open($form_options) !!}
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('day', 'Select day: ' ) !!}  
                                {!! Form::select('day', 
                                    ['monday'=>'monday', 
                                    'tuesday'=>'tuesday', 
                                    'wednesday'=>'wednesday', 
                                    'thursday'=>'thursday', 
                                    'friday'=>'friday', 
                                    'saturday'=>'saturday', 
                                    'sunday'=>'sunday'], 
                                    0, 
                                    $field_options) 
                                !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('time', 'Enter opening and closing times (make sure to separate with time with a comma): ' ) !!}  
                                {!! Form::text('time', '10:00am,11:00pm', ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true, 'placeholder' => '10:00am,11:00pm']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::submit('Add Operating Hours', ['class' => 'btn-primary']) !!}  
                            </div>
                        </div>
                     
                        {!! Form::close() !!}
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


