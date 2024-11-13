<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model
{
    protected $table      = 'configuracion_riego';  // Cambié el nombre de la tabla
    protected $primaryKey = 'id_configuracion';  // Campo de clave primaria
    protected $allowedFields = ['id_planta', 'nivel_minimo_humedad', 'nivel_maximo_humedad']; // Campos a permitir

    public function obtenerUltimaConfiguracion($id_planta)
    {
        return $this->where('id_planta', $id_planta)
                    ->orderBy('id_configuracion', 'DESC')
                    ->first();
    }
    
    public function insertarDatos($array)
    {
        return $this->insert($array);
    }
    public function eliminarConfiguracionesPorPlanta($idPlanta) {
        // Realizar la eliminación
        return $this->where('id_planta', $idPlanta)->delete();
    }
}
