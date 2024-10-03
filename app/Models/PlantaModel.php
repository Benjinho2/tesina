<?php 
namespace App\Models;

use CodeIgniter\Model;

class PlantaModel extends Model
{
    protected $table = 'planta';
    protected $allowedFields = ['nombre_planta', 'id_ubicacion'];

    public function insertDatos($data)
    {
        return $this->insert($data);
    }
    // Método para obtener las plantas del usuario
    public function obtenerPlantasPorUsuario($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->findAll();
    }
    public function getPlantasConUbicacion($id_usuario)
    {
        return $this->db->table($this->table)
            ->select('planta.*, ubicacion.lugar_planta')
            ->join('ubicacion', 'ubicacion.id_ubicacion = planta.id_ubicacion')
            ->where('planta.id_usuario', $id_usuario)
            ->get()
            ->getResultArray();
    }
}


