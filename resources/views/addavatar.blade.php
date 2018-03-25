@extends('layouts.app')
@section('content')
<h1>Ajouter un avatar</h1>
{!! Form::open(array('url' => 'addAvatar', 'files'=>true)) !!}
<div>
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email') !!}
</div>
<div>
    <p>
        {!! Form::label('Choisissez un avatar (max 16Mo)') !!}
        {!! Form::file('pic') !!}
    </p>

</div>
<div>
    {!! Form::submit('Ajouter un avatar') !!}
</div>
@endsection