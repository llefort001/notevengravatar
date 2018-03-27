@extends('layouts.app')
@section('content')

    <h1>Avatars</h1>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Email</td>
            <td>Avatar</td>
        </tr>
        @foreach($avatars as $key => $avatar)
            <tr>
                <td>{{ $avatar->id }}</td>
                <td>{{ $avatar->email }}</td>
                <td><img class="img-fluid" style="width: 128px" src="avatar/{{ $avatar->id }}">
                    <a class="btn btn-outline-primary"
                       href="{{route('deleteAvatar', ['id' => $avatar->id ])}}"
                       onclick="return confirm('Confirmer la suppression de l\'avatar ?')">Supprimer</a></td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="addAvatar">Ajouter un avatar</a>


@endsection
