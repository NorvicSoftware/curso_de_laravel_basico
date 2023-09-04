<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PublicacionRepository;

class PublicacionController extends Controller
{
    protected $publicaciones;

    public function __construct(PublicacionRepository $publicaciones)
    {
        $this->publicaciones = $publicaciones;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = $this->publicaciones->obtenerPublicaciones();
        return view('publicaciones.lista', ['publicaciones' => $publicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->publicaciones->insertarPublicacion($request);
        return redirect()->action([PublicacionController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publicacion = $this->publicaciones->obtenerPublicacionPorId($id);
        return view('publicaciones.ver', ['publicacion' => $publicacion]);
    }

    /**
     * Display the specified resource for.
     */
    public function showPublicaciones(string $alumno_id, string $id)
    {
        $publicaciones = $this->publicaciones->obtenerPublicacionesPorAlumno($alumno_id);
        return view('publicaciones.verPublicaciones', ['publicaciones' => $publicaciones]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publicacion = $this->publicaciones->obtenerPublicacionPorId($id);
        return view('publicaciones.editar', ['publicacion' => $publicacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->publicaciones->actualizarPublicacion($request, $id);
        return redirect()->action([PublicacionController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->publicaciones->eliminarPublicacion($id);
        return redirect()->action([PublicacionController::class, 'index']);
    }
}
