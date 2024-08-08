<?php 
namespace App\Models;

use CodeIgniter\Model;

class CodigoModel extends Model{
    protected $table      = 'codigo';
    protected $primaryKey = 'id_codigo';
    protected $allowedFields = ['id_usuario','token', 'token_expires'];
    
    public function insertarToken($array)
    {
        return $this->insert($array);
    }

    public function obtenerUsuarioPorToken($token)
    {
        return $this->where('token', $token)
                    ->where('token_expires >=', date('Y-m-d H:i:s'))
                    ->first();
    }

    public function eliminarTokenPorUsuario($idUsuario)
    {
        $this->where('id_usuario', $idUsuario)->delete();

    }
    
}