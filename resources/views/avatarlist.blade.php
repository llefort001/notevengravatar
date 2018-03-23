<!DOCTYPE html>
<html>
<head>
    <title>Image list</title>
</head>
<body>
<h1>Avatars</h1>
<p>
    <a href="add">Add avatar</a>
</p>
<table border="1">
    <tr><td>Id</td><td>Email</td><td>Avatar</td></tr>
    @foreach($avatars as $key => $avatar)
        <tr><td>{{ $avatar->id }}</td><td>{{ $avatar->email }}</td><td><img src="pic/{{ $avatar->id }}"></td></tr>
    @endforeach
</table>


</body>
</html>