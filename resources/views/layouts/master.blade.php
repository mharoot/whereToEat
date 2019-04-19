<?php
/*
Blade gives you the ability to define a master layout that the children then extend with their own specific data. 
This prevents duplication of front-end code and promotes code reuse. The master layout renders data from its children
 using the @yield() directive for a matching section name in the child view.

resources/views/layouts/master.blade.php

*/

?>


<div>
   <p>This is the master header</p>
</div>

<div>@yield('content')</div>

<div>
   <p>This is the master footer</p>
</div>


<?php
/*
The child view then specifies what layout it is using via the @extends() directive as well as section names
 (using the @section() directive) with content to be loaded into the master layout:

resources/views/pages/cart/additem.blade.php
@extends('layouts.master')

@section('content')
   <p>You can add an item to your cart on this page</p>
@endsection


*/