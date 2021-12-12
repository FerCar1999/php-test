<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mat_materia';

    protected $primaryKey = 'mat_id';

    protected $fillable = ['mat_nombre'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


    public function grados()
    {
        return $this->hasMany(MateriaGrado::class, 'mxg_id_mat', 'mat_id');
    }
}
