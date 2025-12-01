<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaHistorialMedico extends Model
{
    // Indicar el nombre exacto de la vista en SQL
    protected $table = 'vista_historial_medico'; 
    
    // Desactivar timestamps porque las vistas no tienen updated_at/created_at
    public $timestamps = false;
}
