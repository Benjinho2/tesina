<?php 
namespace App\Models;

use CodeIgniter\Model;

class CodigoModel extends Model{
    protected $table      = 'codigo';
    protected $primaryKey = 'id_codigo';
    protected $allowedFields = ['id_usuario','codigo_verificacion'];
    
    public function insertarDatosCodigo($array)
    {
        return $this->insert($array);
    }
    public function verificarCodigoPorCodigo($codigoVerificacion) {
        return $this->where('codigo_verificacion', $codigoVerificacion)
                    ->first();
    }
}