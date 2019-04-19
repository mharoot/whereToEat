

<p>{{ $user }}</p>
<p>{{ $user_role }}</p>
<p>{{ $join }}</p>


<?php 
































?>
<?php

//old
//$user = $user->toArray();
//echo $user[0]['name']."</br>";
//echo $user[0]['pivot']['role_id'];


   /*public function tableJoin() {
        $id =  Auth::id();
        $user = User::find($id);//->roles()->get();
        //$user = $user->toArray();
        //$user_role = Role::find($user[0]['pivot']['role_id']);
        return view('pages.cart.rolesJoinUser', ['user' => $user]);//, 'user_role' => $user_role]);
   }
?>

@foreach ($user->roles as $col)
    <p>{{ $col }}</p>
@endforeach

<p>{{ $user->roles[0]['pivot'] }}</p>

<p>{{ $user->roles[0]['pivot']['role_id'] }}</p>

<p> {{ DB::table('roles')->where('id', '=', $user->roles[0]['pivot']['role_id'])->get() }} </p>
<?php
print_r(DB::table('roles')->where('id', '=', $user->roles[0]['pivot']['role_id'])->get());//{ ["fillable":protected]=> array(3) { [0]=> string(4) "name" [1]=> string(5) "email" [2]=> string(8) "password" } */
//print_r($user->roles);


/*
@foreach ($user as $col)
    <p>{{ $col }}</p>
@endforeach
*/