<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model
{
    protected $table      = 'configuracion_riego';  // Cambié el nombre de la tabla
    protected $primaryKey = 'id_configuracion';  // Campo de clave primaria
    protected $allowedFields = ['id_planta', 'nivel_minimo_humedad', 'nivel_maximo_humedad']; // Campos a permitir

    // Si necesitas configurar el acceso de las fechas, puedes incluir los campos creados y actualizados
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
}
