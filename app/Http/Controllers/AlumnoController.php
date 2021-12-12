<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    protected $alumno;

    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->alumno->with('grado.materiasGrado.materia')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $validated = $request->validated();
        if ($this->alumno->create($validated)) {
            return response(['response' => true, 'message' => 'Alumno guardado con exito'], 201);
        } else {
            return response(['response' => false, 'message' => 'No se pudo guardar el alumno'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->alumno->with('grado.materiasGrado.materia')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumnoRequest $request, $id)
    {
        $validated = $request->validated();
        if ($this->alumno->find($id)->update($validated)) {
            return response(['response' => true, 'message' => 'Alumno modificado con exito'], 200);
        } else {
            return response(['response' => false, 'message' => 'No se pudo modificar el alumno'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->alumno->find($id)->delete()) {
            return response(['response' => true, 'message' => 'Alumno eliminado con exito'], 200);
        } else {
            return response(['response' => false, 'message' => 'No se pudo eliminar el alumno'], 400);
        }
    }
}
