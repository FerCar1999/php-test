<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'alm_alumno';

    protected $primaryKey = 'alm_id';

    protected $fillable = ['alm_codigo', 'alm_nombre', 'alm_edad', 'alm_sexo', 'alm_id_grd', 'alm_observacion'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'alm_id_grd', 'grd_id');
    }
}
