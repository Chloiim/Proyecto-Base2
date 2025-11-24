<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'Medico';
    protected $primaryKey = 'idMedic';
    public $timestamps = false;

    protected $fillable = [
        'nombresMedic','apellidosMedic','dniMedic',
        'especialidadMedic','telefonoMedic','emailMedic'
    ];
}
