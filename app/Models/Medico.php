<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medico';
    protected $primaryKey = 'idMedic';
    public $timestamps = false;

    protected $fillable = [
        'nombresMedic','apellidosMedic','dniMedic',
        'especialidadMedic','colegiaturaMedic','telefonoMedic','emailMedic','idArea'
    ];
}
