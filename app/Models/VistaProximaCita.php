<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaProximaCita extends Model
{
    // Indicar el nombre exacto de la vista en SQL
    protected $table = 'Vista_Proximas_Citas'; 
    
    // Desactivar timestamps porque las vistas no tienen updated_at/created_at
    public $timestamps = false;
}
