@extends('layouts.app')
<?php
$form_options = ['class'=>'col-md-12', 'id'=>'add_menu_item', 'style'=>'border:solid gray 1px'];
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
                                {!! Form::label('item_name', 'Item Name: ' ) !!}  
                                {!! Form::text('item_name', null, ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('item_description', 'Item Description: ' ) !!}  
                                {!! Form::textarea('item_description', null, ['class'=> 'form-control', 'autofocus'=>true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                {!! Form::label('item_price', 'Item Price in Dollars: ' ) !!}  
                                {!! Form::text('item_price', null, ['class'=> 'form-control', 'required'=>true, 'autofocus'=>true, 'placeholder' => '5.50']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="padding-top:5%" class="col-md-8">
                                {!! Form::submit('Add Menu Item', ['class' => 'btn-primary']) !!}  
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


