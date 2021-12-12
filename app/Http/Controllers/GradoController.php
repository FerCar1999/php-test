<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradoRequest;
use App\Models\Grado;
use App\Models\MateriaGrado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    protected $grado, $materiagrado;

    public function __construct(Grado $grado, MateriaGrado $materiagrado)
    {
        $this->grado = $grado;
        $this->materiagrado = $materiagrado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->grado->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoRequest $request)
    {
        $validated = $request->validated();
        $grado = $this->grado->create($validated);
        if ($grado) {
            $materias = $request->input('mxg_id_mat');
            for ($i = 0; $i < count($materias); $i++) {
                if (!$this->materiagrado->create(['mxg_id_mat' => $materias[$i], 'mxg_id_grd' => $grado->grd_id])) {
                    return response(['response' => false, 'message' => 'Grado guardado con exito. Sin embargo las materias no se pudieron agregar'], 400);
                }
            }
            return response(['response' => true, 'message' => 'Grado guardado con exito'], 201);
        } else {
            return response(['response' => false, 'message' => 'No se pudo guardar el grado'], 400);
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
        return $this->grado->with('materiasGrado')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoRequest $request, $id)
    {
        $materias = json_decode($request->input('mxg_id_mat'));
        $validated = $request->validated();
        if ($this->grado->find($id)->update($validated)) {
            //eliminando todas las materias que ya tenia
            $this->materiagrado->where('mxg_id_grd', $id)->delete();
            for ($i = 0; $i < count($materias); $i++) {
                //verificando existencia de ese campo
                $materiagrado = $this->materiagrado->where('mxg_id_mat', $materias[$i])->where('mxg_id_grd', $id)->first();
                if ($materiagrado) {
                    $materiagrado->update(['deleted_at', null]);
                } else {
                    $this->materiagrado->create(['mxg_id_mat' => $materias[$i], 'mxg_id_grd' => $id]);
                }
            }
            return response(['response' => true, 'message' => 'Grado modificado con exito'], 200);
        } else {
            return response(['response' => false, 'message' => 'No se pudo modificar el grado'], 400);
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
        if ($this->grado->find($id)->delete()) {
            return response(['response' => true, 'message' => 'Grado eliminado con exito'], 200);
        } else {
            return response(['response' => false, 'message' => 'No se pudo eliminar el grado'], 400);
        }
    }
}
