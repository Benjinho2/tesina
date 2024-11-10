<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model
{
    // Definir la tabla en el modelo
    protected $table = 'configuracion_riego'; // Asegúrate de que esta sea la tabla correcta
    protected $primaryKey = 'id_configuracion'; // Llave primaria
    
    // Define los campos que pueden ser accesibles para insertar o actualizar
    protected $allowedFields = [
        'id_planta', 
        'id_dispositivo', 
        'nivel_minimo_humedad', 
        'nivel_maximo_humedad'
    ];

    // Método para guardar la configuración
    public function guardarConfiguracion($data)
    {
        return $this->insert($data); // Inserta los datos en la tabla
    }

    // Método para obtener la configuración por planta y dispositivo
    public function obtenerConfiguracionPorPlantaYDispositivo($id_planta, $id_dispositivo)
    {
        return $this->where('id_planta', $id_planta)
                    ->where('id_dispositivo', $id_dispositivo)
                    ->orderBy('id_configuracion', 'DESC')
                    ->first(); // Retorna solo el más reciente
    }
}