<?php 

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use CodeIgniter\Controller;

class CConfiguracion extends Controller{

    public function guardar()
    {
        $configuracionModel = new ConfiguracionModel();
        
        $iddispositivo  = 3;
        $nivelMinimo    = $this->request->getPost('nivel_minimo_humedad');
        $nivelMaximo    = $this->request->getPost('nivel_maximo_humedad');
      

        // Obtener los datos del formulario

        $array = [
            'id_dispositivo'       =>  $iddispositivo,
            'nivel_minimo_humedad' =>  $nivelMinimo,
            'nivel_maximo_humedad' =>  $nivelMaximo
        ];

        // Guardar los datos en la base de datos

        if ($configuracionModel->guardarConfiguracion($array)) {
            echo "Configuración agregada correctamente.";
        } else {
            echo "Error al agregar la configuración.";
        }
}
}

      