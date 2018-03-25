@extends('layouts.app')
@section('content')

<h1>Avatars</h1>
<p>
    <a href="addAvatar">Ajouter un avatar</a>
</p>
<table border="1">
    <tr><td>Id</td><td>Email</td><td>Avatar</td></tr>
    @foreach($avatars as $key => $avatar)
        <tr><td>{{ $avatar->id }}</td><td>{{ $avatar->email }}</td><td><img src="avatar/{{ $avatar->id }}"></td></tr>
    @endforeach
</table>

@endsection
