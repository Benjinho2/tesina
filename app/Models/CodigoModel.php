<?php 
namespace App\Models;

use CodeIgniter\Model;

class CodigoModel extends Model {
    protected $table      = 'codigo';
    protected $primaryKey = 'id_codigo';
    protected $allowedFields = ['id_usuario','codigo'];

    public function insertarCodigo($array)
    {
        return $this->insert($array);
    }

    public function obtenerUsuarioPorCodigo($codigo)
    {
        return $this->where('codigo', $codigo)
                    ->first();      
    }
    // En tu modelo CodigoModel

    public function obtenerUsuarioPorCodigoPorId($idUsuario) {
        return $this->where('id_usuario', $idUsuario)->first();
    }

    public function actualizarCodigo($idUsuario, $nuevoCodigo) {
        return $this->where('id_usuario', $idUsuario)->set('codigo', $nuevoCodigo)->update();
    }

    
    public function eliminarCodigoPorUsuario($idUsuario)
    {
        $this->where('id_usuario', $idUsuario)->delete();
    }
}