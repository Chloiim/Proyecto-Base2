<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'Cita';
    protected $primaryKey = 'idCit';
    public $timestamps = false;

    protected $fillable = [
        'fechaCit','horaCit','motivoCit',
        'estadoCit','idPacient','idMedic'
    ];

    public function paciente(){ return $this->belongsTo(Paciente::class,'idPacient'); }
    public function medico(){ return $this->belongsTo(Medico::class,'idMedic'); }
}
