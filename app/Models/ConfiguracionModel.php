<?php 
namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model{
    protected $table         = 'configuracion_riego';
    protected $primaryKey    = 'id_configuracion';
    protected $allowedFields = [
    'id_dispositivo', 
    'nivel_minimo_humedad',
    'nivel_maximo_humedad',
    ];

    public function guardarConfiguracion($array)
    {
        return $this->insert($array);
    }
}
