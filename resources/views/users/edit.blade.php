<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <h3>Editar usuario</h3>
    <form action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')
        <label for="name">Ingrese el nombre del usuario:</label>
        <br>
        <input type="text" id="name" name="Username" value="{{$user->name}}">
        <br>
        <label for="typeUsers">Elija el rol:</label>
        <select id="typeUsers" name='UserType'>
            <option value="{{$user->type}}">{{$user->role->name}}</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        <br>
        <label for="email">Ingrese su email:</label>
        <input type="email" id="email" name="UserEmail" value="{{$user->email}}">
        <br>
        <label for="password">Ingrese la contraseña:</label>
        <input type="password" id="password" name="UserPassword" value="{{$user->password}}">
        <br>
        <button type="submit">Editar</button>
        </form>
</body>
</html>