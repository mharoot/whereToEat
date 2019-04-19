@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading" >Dashboard</div>
                <div class="panel-body">
                    @if (session('user_role') == 1)
                        <h1>Admin Panel</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn-success"> <a class="btn-success" href="{{ url('/addRestaurantForm') }}"> + Add Restaurant </a> </button>
                                    </div>
                                    <div id="space_out_for_mobile"></div>
                                    <script>
                                    /*
                                    |-------------------------------------------
                                    |   This script is in charge of spacing out 
                                    |   the button above and below this script,
                                    |   targeting the div above to achieve it.
                                    |   I had to use BR since margin and padding
                                    |   styles did not make the spacing i neeed.
                                    |-------------------------------------------
                                    */
                                        // first time load 
                                        var resized = false;
                                        screenResize();
                                        window.addEventListener("resize", screenResize);
                                        function screenResize() { 
                                            var space = document.getElementById('space_out_for_mobile');
                                            var onMobileAndNoSpace = 'ontouchstart' in window && space.firtChild == null;
                                            var w = window.innerWidth;
                                            var h = window.innerHeight;
                                            // desktop
                                            if (h*0.9 > w ) {
                                                space.style="margin:10%;";
                                            } else if (h*0.9 <= w) {
                                                space.style="";
                                            }

                                            // mobile
                                            if (onMobileAndNoSpace && !resized) {
                                                for (i = 0; i < 4; i++) {
                                                    space.append(document.createElement("BR"));
                                                }
                                                resized = true;

                                            }
                                        }
                                    </script>
                                        <button class="btn-primary"> <a class="btn-primary" href="{{ url('/manageUsers') }}"> Users </a></button>
                                    </div>
                                </div>
                            </div>
                    @elseif (session('user_role') == 2)
                        <h1>My Profile</h1>
                        <div class="container">
                            <div class="row">
                                <button class="btn-primary"> <a class="btn-primary" href="{{ url('/changePassword') }}"> Change Password </a> </button>
                            </div>
                            <div class="row">
                                <h2>Username</h2>
                                <p> {{ $user['email'] }} (same as email)</p>
                            </div>
                            <div class="row">
                                <h2>Full Name</h2>
                                <p> {{ $user['name'] }}</p>
                            </div>
                            <div class="row">
                                <h2>Email Address</h2>
                                <p> {{ $user['email'] }}</p>
                            </div>
                            <div class="row">
                                <h2>Registration Date</h2>
                                <p> {{ date("F j, Y, g:i a", strtotime( $user['created_at']) ) }}</p>
           
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
