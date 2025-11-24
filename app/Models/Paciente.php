<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'Paciente';
    protected $primaryKey = 'idPacient';
    public $timestamps = false;

    protected $fillable = [
        'nombresPacient','apellidosPacient','dniPacient',
        'alergiasPacient','grupoSanguineo',
        'telefonoPacient','emailPacient'
    ];

    public function citas(){
        return $this->hasMany(Cita::class, 'idPacient', 'idPacient');
    }
}
