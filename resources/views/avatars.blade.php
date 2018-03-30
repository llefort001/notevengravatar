@extends('layouts.app')
@section('content')

    <h1>Avatars</h1>
    <table id="table" class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Avatar</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($avatars as $key => $avatar)
            <tr>
            <td data-title="#">{{ $avatar->id }}</td>
            <td data-title="Email">{{ $avatar->email }}</td>
            <td data-title="Avatar"><img class="img-fluid" style="width: 128px" src="api/avatar/{{ $avatar->hashed_email }}"></td>
            <td data-title="Actions"><a class="btn btn-outline-primary" href="{{route('deleteAvatar', ['avatar' => $avatar ])}}"
                                       onclick="return confirm('Confirmer la suppression de l\'avatar ?')">Supprimer</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="addAvatar">Ajouter un avatar</a>


@endsection
