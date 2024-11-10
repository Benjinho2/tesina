<?php

php

namespace AppModels;

use CodeIgniterModel;

class MedicionModel extends Model
{
    protected $table = 'medicion';
    protected $primaryKey = 'id_medicion';
    protected $allowedFields = ['id_planta', 'humedad', 'id_usuario', 'fecha'];

    // Método para obtener todas las mediciones
    public function getMediciones()
    {
        return $this-findAll();
    }

    // Función para obtener las 10 mediciones más recientes
    public function getUltimasMediciones($limit = 10)
    {
        return $this-orderBy('fecha', 'DESC')-findAll($limit);
    }

    // Modificar la firma del método save()
    public function save($data)// bool
    {
        log_message('error', 'Guardando medición ' . print_r($data, true)); // Agregar log para depurar
        return parentsave($data);  //Llamar a la función save de la clase base
    }
}
