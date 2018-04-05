@extends('layouts.app')
@section('content')

<div class="container">
    @if(isset($error))
    <div class="alert alert-danger" role="alert">

            {{ $error }}

    </div>
    @endif

    <h1>Ajouter un avatar</h1>
    {!! Form::open(array('url' => 'addAvatar', 'files'=>true)) !!}
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email',null,array('class' => 'form-control', 'placeholder' => "example@email.com", "aria-describedby" => "emailHelp")) !!}
        <small id="emailHelp" class="form-text text-muted">Cet email doit vous appartenir</small>
    </div>
    <div class="form-group">
        <p>
            {!! Form::label('pic','Choisissez un avatar (max 16Mo)',array('class' => 'btn btn-primary', 'accept' => 'image/*')) !!}

            <br>
            {!! Form::file('pic',array('style' => 'display: none')) !!}
        </p>

    </div>
    <div>
        {!! Form::submit('Ajouter un avatar',array('class' => 'btn btn-success')) !!}
    </div>

</div>
@endsection