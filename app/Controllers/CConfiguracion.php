<?php 

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use CodeIgniter\Controller;

class CConfiguracion extends Controller{

    public function guardar()
    {
        $configuracionModel = new ConfiguracionModel();
        
        
        $nivelMinimo    = $this->request->getPost('nivel_minimo_humedad');
        $nivelMaximo    = $this->request->getPost('nivel_maximo_humedad');
        $duracionRiego  = $this->request->getPost('duracion_riego');
        $intervaloRiego = $this->request->getPost('intervalo_riego');
        $iddispositivo  = 1;

        // Obtener los datos del formulario

        $array = [
            'id_dispositivo'       =>  $iddispositivo,
            'nivel_minimo_humedad' =>  $nivelMinimo,
            'nivel_maximo_humedad' =>  $nivelMaximo,
            'duracion_riego'       =>  $duracionRiego,
            'intervalo_riego'      =>  $intervaloRiego
        ];

        // Guardar los datos en la base de datos

        $configuracionModel->guardarConfiguracion($array);

        // Redirigir a la página de configuración

        return redirect()->to('configuracion');
    }
}