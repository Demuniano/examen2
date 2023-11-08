<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h3>Vista usuarios</h3>
    <form action="{{route('users.store')}}" method="post">
        @csrf
    <label for="name">Ingrese el nombre del usuario:</label>
    <br>
    <input type="text" id="name" name="Username">
    <br>
    <label for="typeUsers">Elija el rol:</label>
    <select id="typeUsers" name='UserType'>
        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
    </select>
    <br>
    <label for="email">Ingrese su email:</label>
    <input type="email" id="email" name="UserEmail">
    <br>
    <label for="password">Ingrese la contraseña:</label>
    <input type="password" id="password" name="UserPassword">
    <br>
    <button type="submit">Crear</button>
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>NameRol</th>
            <th>Email</th>
            <th>Opciones</th>
        </tr>
        <tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('users.edit',$user->id)}}"><button>Edit</button></a></td>
                    <td>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>