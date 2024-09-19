<?php 
namespace App\Models;

use CodeIgniter\Model;

class DispositivoModel extends Model{
    protected $table         = 'dispositivos';
    protected $primaryKey    = 'id_dispositivo';
    protected $allowedFields = ['nombre_dispositivo', 'id_usuario'];

    public function ObtnerDispositivoIdUsuario($id_usuario)
    {               
        return $this->where('id_usuario', $id_usuario)->first();
    }

}