<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicionModel extends Model
{
    protected $table = 'medicion';
    protected $primaryKey = 'id_medicion';
    protected $allowedFields = ['id_planta', 'humedad', 'id_usuario', 'fecha'];

    // Método para obtener todas las mediciones
    public function getMediciones()
    {
        return $this->findAll();
    }
    
}
