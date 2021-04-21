<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id','medico_id','dataMarcacao'];

    public function medico()
    {
        return $this->belongsTo(\App\Models\Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class);
    }
}
