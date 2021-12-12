<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateriaGrado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mxg_materiasxgrado';

    protected $primaryKey = 'mxg_id';

    protected $fillable = ['mxg_id_grd', 'mxg_id_mat'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'mxg_id_grd', 'grd_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'mxg_id_mat', 'mat_id');
    }
}
