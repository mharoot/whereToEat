@extends('layouts.app')

@section('content')
@if( session('user_role') == 1)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>
                <div class="panel-body">
                    <h1> Users </h1>
                    @if(session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                    <table class="table table--striped table--bordered table--padded table--hover">
                        <thead>
                            <th>Username</th> 
                            <th>Email</th> 
                            <th>Display Name</th> 
                            <th>Actions</th>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                            <td data-label="Username: ">{{$user['username']}}</td>
                            <td data-label="Email: ">{{$user['email']}}</td>
                            <td data-label="Display Name: ">{{$user['display_name']}}</td>
                            <td>
                            {!! Form::open( array( 'url' => url('changeUserRole/'.$user['id']) ) ) !!}
                                    @if ($user['role'] == 1)
                                        {!! Form::hidden('role', 2)!!}
                                        {!! Form::submit('Demote', ['class' => 'btn-warning']) !!}
                                    @else
                                        {!! Form::hidden('role', 1)!!}
                                        {!! Form::submit('Promote', ['class' => 'btn-success']) !!}
                                    @endif 
                            {!! Form::close() !!}
                            </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
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