<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable= [
        "nome","idade", "sexo", "sintomas", "pressaoArterial", "glicemia", "saturacao", "batimentosCardiacos", "temperatura", "email", "tipoPaciente"
    ];
}
