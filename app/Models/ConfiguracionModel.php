<?php 
namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model{
    protected $table         = 'configuracion_riego';
    protected $primaryKey    = 'id_configuracion';
    protected $allowedFields = ['id_dispositivo', 'nivel_minimo_humedad', 'nivel_maximo_humedad'];

    // Método para guardar la configuración
    public function guardarConfiguracion($array)
    {
        return $this->insert($array);
    }
    
      // Método para obtener la configuración junto con los detalles de la planta
      public function obtenerConfiguracionConPlanta($iddispositivo)
      {
          return $this->select('configuracion_riego.*, planta.nombre_planta, ubicacion.nombre_ubicacion')
                      ->join('planta', 'planta.id_planta = configuracion_riego.id_dispositivo')
                      ->join('ubicacion', 'ubicacion.id_ubicacion = planta.id_ubicacion')
                      ->where('configuracion_riego.id_dispositivo', $iddispositivo)
                      ->first(); // Usamos first() para obtener un solo resultado
      }
}
