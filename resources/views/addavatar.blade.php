<!DOCTYPE html>
<html>
<head>
    <title>Add Avatar</title>
</head>
<body>
<h1>Add Avatar</h1>
{!! Form::open(array('url' => 'add', 'files'=>true)) !!}
<div>
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email') !!}
</div>
<div>
    <p>
        {!! Form::label('Choisissez un avatar (max 64Ko)') !!}
        {!! Form::file('pic') !!}
    </p>

</div>
<div>
    {!! Form::submit('Ajouter un avatar') !!}
</div>
</body>
</html>