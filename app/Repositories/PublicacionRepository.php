<?php

namespace App\Repositories;
use App\Models\Publicacion;

class PublicacionRepository {

    public function obtenerPublicaciones()
    {
        return Publicacion::all();
    }

    public function obtenerPublicacionPorId($id)
    {
        return Publicacion::find($id);
    }

    public function obtenerPublicacionesPorAlumno($alumno_id)
    {
        return Publicacion::where('alumno_id', '=', $alumno_id)->get();
    }

    public function insertarPublicacion($publicacion)
    {
        Publicacion::create([
            'titulo' => $publicacion->titulo,
            'publicacion' => $this->getdate($publicacion->publicacion),
            'genero' => $publicacion->genero,
            'alumno_id' => $publicacion->alumno_id,
        ]);
    }

    public function actualizarPublicacion($publicacionActualizar, $id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->titulo = $publicacionActualizar->titulo;
        $publicacion->publicacion = $this->getdate($publicacionActualizar->publicacion);
        $publicacion->genero = $publicacionActualizar->genero;
        $publicacion->alumno_id = $publicacionActualizar->alumno_id;
        $publicacion->save();
    }

    public function eliminarPublicacion($id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
    }

    public function getDate($date)
    {
        return date('Y-m-d', strtotime(str_replace('/', '-', $date)));
    }

}