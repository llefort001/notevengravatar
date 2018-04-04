@extends('layouts.app')
@section('content')

    <h1>Avatars <a class="btn btn-success" href="addAvatar"> <i class="fa fa-plus"></i>
        </a>
    </h1>
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
                <td data-title="Avatar"><img class="img-fluid" style="width: 128px"
                                             src="api/avatar/{{ $avatar->hashed_email }}"></td>
                <td data-title="Actions"><a class="btn btn-outline-primary"
                                            href="{{route('deleteAvatar', ['avatar' => $avatar ])}}"
                                            onclick="return confirm('Confirmer la suppression de l\'avatar ?')"><i class="fa fa-2x fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
