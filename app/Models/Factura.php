<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'Factura';
    protected $primaryKey = 'idFac';
    public $timestamps = false;

    protected $fillable = [
        'fechaEmisionFac','montoTotal','idConsul','idPacient'
    ];

    public function paciente(){ return $this->belongsTo(Paciente::class,'idPacient'); }
    public function consulta(){ return $this->belongsTo(Consulta::class,'idConsul'); }
}
