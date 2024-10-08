<?php 
namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model{
    protected $table         = 'configuracion_riego';
    protected $primaryKey    = 'id_configuracion';
    protected $allowedFields = ['id_dispositivo', 'id_planta','nivel_minimo_humedad', 'nivel_maximo_humedad'];

    // Método para guardar la configuración
    public function guardarConfiguracion($array)
    {
        return $this->insert($array);
    }
    
    public function eliminarConfiguracionesPorPlanta($id_planta)
    {
        return $this->where('id_planta', $id_planta)->delete();
    }

}
