@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Avatars <a class="btn btn-success" href="addAvatar"> <i class="fa fa-plus"></i>
        </a>
    </h1>
    <div class="row">
        @foreach($avatars as $key => $avatar)
            <div class="col-3">
                <div class="card text-center mb-4">
                    <img class="mx-auto mt-1" style="width: 128px; height: 128px;" src="api/avatar/{{ $avatar->hashed_email }}"
                         alt="Card avatar cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $avatar->email }}</h5>
                        <a class="btn btn-outline-primary"
                           href="{{route('deleteAvatar', ['avatar' => $avatar ])}}"
                           onclick="return confirm('Confirm delete ?')"><i
                                    class="fa fa-2x fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
