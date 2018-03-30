@extends('layouts.app')
@section('content')
    <div class="col-2 offset-5">
        <h1>Ajouter un avatar</h1>
        {!! Form::open(array('route' => 'addAvatar','class' => 'form','files'=>true)) !!}

        <div class="form-group">
            {!! Form::label('email', 'Email:',array('style'=>'display: none')) !!}
            {!! Form::email('email',null,array('class' => 'form-control', 'placeholder' => "example@email.com", "aria-describedby" => "emailHelp", "required"=>"required" )) !!}
            <small id="emailHelp" class="form-text text-muted">Cet email doit vous appartenir</small>
        </div>

        <div class="form-group input-file-container">
            {!! Form::label('pic','Choisissez un avatar (max 16Mo)',array('class' => 'input-file-trigger btn btn-success', 'accept' => 'image/*')) !!}
            {!! Form::file('pic',array('class'=>'input-file','id'=>'my-file','required'=>'required')) !!}
            <p class="file-return"></p>
        </div>
        {!! Form::submit('Ajouter un avatar',array('class' => 'btn btn-primary')) !!}
    </div>

@endsection