<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriaRequest;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    protected $materia;

    public function __construct(Materia $materia)
    {
        $this->materia = $materia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->materia->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaRequest $request)
    {
        $validated = $request->validated();
        if ($this->materia->create($validated)) {
            return response(['response' => true, 'message' => 'Materia guardada con exito'], 201);
        } else {
            return response(['response' => false, 'message' => 'No se pudo guardar la materia'], 400);
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
        return $this->materia->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaRequest $request, $id)
    {
        $validated = $request->validated();
        if ($this->materia->find($id)->update($validated)) {
            return response(['response' => true, 'message' => 'Materia modificada con exito'], 200);
        } else {
            return response(['response' => false, 'message' => 'No se pudo modificar la materia'], 400);
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
        if ($this->materia->find($id)->delete()) {
            return response(['response' => true, 'message' => 'Materia eliminada con exito'], 200);
        } else {
            return response(['response' => false, 'message' => 'No se pudo eliminar la materia'], 400);
        }
    }
}
