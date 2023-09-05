<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
    <form action="/publicaciones/editar/{{ $publicacion->id}}" method ="POST">
        @csrf
        {{ method_field('PUT') }}
        <label>Título:</label>
        <input type="text" name="titulo" placeholder="Título" value="{{ $publicacion->titulo}}">
        <label>Fecha publicación:</label>
        <input type="text" name="publicacion" placeholder="dd/mm/aaaa" value="{{ $publicacion->publicacion}}">
        <label>Género:</label>
        <input type="text" name="genero" placeholder="Género" value="{{ $publicacion->genero}}">
        <label>Alumno:</label>
        <select name="alumno_id" id="alumno_id">
            @foreach ($alumnos as  $alumno)
                <option value="{{ $alumno->id }}" {{ ($alumno->id == $publicacion->alumno_id) ? 'selected' : '' }}>{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
            @endforeach
        </select>
        <input type="submit" value="Guardar">
    </form>
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
    </body>
</html>

<!-- Styles -->
<style>
    body {
        margin: auto;
        padding: 50px;
    }

    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>


