<?php

for($i = 0; $i < sizeOf($roles); $i++) {
    echo 'role name: '.$roles[$i]->name;
    echo '</br> role id: '.$roles[$i]->role_id;
    echo '</br></br>';
}
?>
@for ($i = 0; $i < sizeOf($roles); $i++)
    <p>Role name: {{ $roles[$i]->name }}</p>
    <p>Role id: {{ $roles[$i]->role_id }}</p>
    </br></br>
@endfor

<?php /*
@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile
*/