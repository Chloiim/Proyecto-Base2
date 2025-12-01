<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaMedicoArea extends Model
{
    // Indicar el nombre exacto de la vista en SQL
    protected $table = 'vista_medicos_por_area'; 
    
    // Desactivar timestamps porque las vistas no tienen updated_at/created_at
    public $timestamps = false;
}
