<?php 
namespace App\Models;

use CodeIgniter\Model;

class UbicacionModel extends Model{
    protected $table      = 'ubicacion';
    protected $primaryKey = 'id_ubicacion';
    protected $allowedFields = ['lugar_planta'];

    public function obtenerTodasLasUbicaciones()
    {
        return $this->findAll();
    }

}