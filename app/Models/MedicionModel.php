<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicionModel extends Model
{
    protected $table = 'medicion';  // Nombre correcto de la tabla
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_planta', 'humedad', 'id_usuario', 'fecha'];
    protected $useTimestamps = false;  // Deshabilitar timestamps
        public function obtenerUltimasMediciones($id_planta, $limite = 7)
    {
        return $this->where('id_planta', $id_planta)
                    ->orderBy('fecha', 'ASC')
                    ->limit($limite)
                    ->findAll();
    }

    public function eliminarMedicionesPorPlanta($idPlanta) {
        // Eliminar todas las mediciones correspondientes al ID de la planta
        return $this->where('id_planta', $idPlanta)->delete();
    }
    public function obtenerMedicionesPorPlanta($idPlanta) {
        // Realizar la consulta y devolver todas las mediciones de la planta
        return $this->where('id_planta', $idPlanta)->findAll();
    }
}
