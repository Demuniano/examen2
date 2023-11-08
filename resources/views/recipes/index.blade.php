<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
</head>
<body>
    <h3>Vista usuarios</h3>
    <form action="{{route('recipes.store')}}" method="post">
        @csrf
    <label for="name">Ingrese el nombre de la receta:</label>
    <input type="text" id="name" name="nameRecipe">
    <br>
    <label for="prote">Cantida proteina:</label>
    <input type="number" id="prote" name="ProteCant">
    <br>
    <label for="carbo">Cantida carbos:</label>
    <input type="number" id="carbo" name="CantCarbo">
    <br>
    <label for="verdu">Cantida verduras:</label>
    <input type="number" id="verdu" name="VerdCant">

    <br>

    <button type="submit">Crear</button>
    </form>

    <table>
        <tr>
            <th>Receta</th>
            <th>Creador</th>
            <th>cant prote</th>
            <th>cant carbo</th>
            <th>cant verdu</th>
            <th>Opciones</th>
        </tr>
        <tr>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{$recipe->name}}</td>
                    <td>{{$recipe->cantProtein}}</td>
                    <td>{{$recipe->cantCarbo}}</td>
                    <td>{{$recipe->cantVerd}}</td>
                    <td><a href="{{route('recipes.edit',$recipe->id)}}"><button>Edit</button></a></td>
                    <td>
                        <form action="{{route('recipes.destroy',$recipe->id)}}" method="post">
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