<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaFacturaPendiente extends Model
{
    // Indicar el nombre exacto de la vista en SQL
    protected $table = 'vista_facturas_pendientes'; 
    
    // Desactivar timestamps porque las vistas no tienen updated_at/created_at
    public $timestamps = false;
}
