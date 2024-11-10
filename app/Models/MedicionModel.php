<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicionModel extends Model
{
    protected $table = 'medicion';  // Nombre correcto de la tabla
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_planta', 'humedad', 'id_usuario', 'fecha'];
    protected $useTimestamps = false;  // Deshabilitar timestamps
}
