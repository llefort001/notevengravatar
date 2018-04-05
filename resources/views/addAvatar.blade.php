@extends('layouts.app')
@section('content')
<div class="container mt-2">
    @if(isset($error))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-2 offset-5">
        <h1>Ajouter un avatar</h1>
        {!! Form::open(array('route' => 'addAvatar','class' => 'form','files'=>true)) !!}

        <div class="form-group">
            {!! Form::label('email', 'Email:',array('style'=>'display: none')) !!}
            {!! Form::email('email',null,array('class' => 'form-control', 'placeholder' => "example@email.com", "aria-describedby" => "emailHelp", "required"=>"required" )) !!}
            <small id="emailHelp" class="form-text text-muted">Cet email doit vous appartenir</small>
        </div>

        <div class="form-group input-file-container">
            {!! Form::label('pic','Choisissez un avatar (max 16Mo)',array('class' => 'input-file-trigger btn btn-success')) !!}
            {!! Form::file('pic',array('class'=>'input-file','id'=>'my-file','required'=>'required','accept' => 'image/*')) !!}
            <p class="file-return"></p>
        </div>
        {!! Form::submit('Ajouter un avatar',array('class' => 'btn btn-primary')) !!}
    </div>
</div>
@endsection