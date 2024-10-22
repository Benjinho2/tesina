<?php 
namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model {
    protected $table         = 'configuracion_riego'; // Nombre de la tabla
    protected $primaryKey    = 'id_configuracion'; // Campo clave primaria
    protected $allowedFields = ['id_dispositivo', 'id_planta', 'nivel_minimo_humedad', 'nivel_maximo_humedad']; // Campos que se pueden modificar

    // Método para guardar la configuración
    public function guardarConfiguracion($array) {
        return $this->insert($array);
    }
    
    // Método para eliminar configuraciones por planta
    public function eliminarConfiguracionesPorPlanta($id_planta) {
        return $this->where('id_planta', $id_planta)->delete();
    }

    // Método para obtener la configuración por planta y dispositivo
    public function obtenerConfiguracionPorPlantaYDispositivo($id_planta, $id_dispositivo) {
        return $this->where(['id_planta' => $id_planta, 'id_dispositivo' => $id_dispositivo])->first();
    }

    // Método para obtener todas las configuraciones
    public function obtenerTodasLasConfiguraciones() {
        return $this->findAll();
    }
}
