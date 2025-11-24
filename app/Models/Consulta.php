<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'Consulta';
    protected $primaryKey = 'idConsult';
    public $timestamps = false;

    protected $fillable = [
        'diagnosticoConsult','tratamientoConsult',
        'fechaConsult','idCit','idMedic'
    ];

    public function cita(){ return $this->belongsTo(Cita::class,'idCit'); }
    public function medico(){ return $this->belongsTo(Medico::class,'idMedic'); }
}
