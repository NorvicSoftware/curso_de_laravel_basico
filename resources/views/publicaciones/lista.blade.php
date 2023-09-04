<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
    <a href="/publicaciones/crear">Nueva publicación</a> 
        <table>
            <tr>
                <th>Título</th>
                <th>Publicación</th>
                <th>Género</th>
                <th>Acción</th>
            </tr>
        @foreach ($publicaciones as $publicacion)
        <tr>
            <td>{{ $publicacion->titulo }}</td>
            <td>{{ $publicacion->publicacion }}</td>
            <td>{{ $publicacion->genero }}</td>
            <td>
                <a href="/publicaciones/ver/{{$publicacion->id}}">Ver</a>
                <a href="/publicaciones/ver/alumno/{{$publicacion->alumno_id}}">Ver publicaciones Alumno</a>
                <a href="/publicaciones/editar/{{$publicacion->id}}">Editar</a>
                <a href="/publicaciones/eliminar/{{$publicacion->id}}" onclick="return eliminarPublicacion('Eliminar Publicación')"> Eliminar</a>
            </td>
        </tr>
        @endforeach
        </table>
    </body>
</html>

<script>
    function eliminarPublicacion(value) {
        action = confirm(value) ? true : event.preventDefault()
    }
</script>

<!-- Styles -->
<style>
    body {
        margin: auto;
        padding: 50px;
    }

    table, td, th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        height: 70px;
    }

    td {
        height: 30px;
    }

    .button {
        background-color:#4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>


