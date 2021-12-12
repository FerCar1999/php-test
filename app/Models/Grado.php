<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grd_grado';

    protected $primaryKey = 'grd_id';

    protected $fillable = ['grd_nombre'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function materiasGrado()
    {
        return $this->hasMany(MateriaGrado::class, 'mxg_id_grd', 'grd_id');
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'alm_id_grd', 'grd_id');
    }
}
