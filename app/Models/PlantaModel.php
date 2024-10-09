<?php 
namespace App\Models;

use CodeIgniter\Model;

class PlantaModel extends Model
{
    protected $table = 'planta';
    protected $primaryKey = 'id_planta';
    protected $allowedFields = ['nombre_planta', 'id_ubicacion', 'id_usuario'];

    public function insertarDatos($array)
    {
        return $this->insert($array);
    }
    
    // Obtener todas las plantas del usuario
    public function obtenerPlantasPorUsuario($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->findAll();
    }

    // Verificar si la planta pertenece al usuario
    public function obtenerPlantaPorIdYUsuario($id_planta, $id_usuario)
    {
        return $this->where('id_planta', $id_planta)
                    ->where('id_usuario', $id_usuario)
                    ->first();
    }
}
