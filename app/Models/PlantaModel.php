<?php 
namespace App\Models;

use CodeIgniter\Model;

class PlantaModel extends Model{
    protected $table         = 'planta';
    protected $primaryKey    = 'id_planta';
    protected $allowedFields = ['nombre_planta','id_ubicacion','id_usuario'];

    public function ObtenerPlanta($id_planta){
        return $this->where('id_planta', $id_planta);
    }
}