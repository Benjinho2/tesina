<?php 

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use CodeIgniter\Controller;

class CConfiguracion extends Controller{

    public function guardar()
    {
    $configuracionModel = new ConfiguracionModel();
    
    $iddispositivo  = 2;
    $nombrePlanta   = $this->request->getPost('nombre_planta');
    $ubicacion      = $this->request->getPost('location');
    $nivelMinimo    = $this->request->getPost('nivel_minimo_humedad');
    $nivelMaximo    = $this->request->getPost('nivel_maximo_humedad');

    $array = [
        'id_dispositivo'       =>  $iddispositivo,
        'nivel_minimo_humedad' =>  $nivelMinimo,
        'nivel_maximo_humedad' =>  $nivelMaximo
    ];

    if ($configuracionModel->guardarConfiguracion($array)) {
        return view('dispositivo', [
            'success' => 'Configuración agregada correctamente.',
            'nombre_planta' => $nombrePlanta,
            'ubicacion' => $ubicacion,
            'nivel_minimo_humedad' => $nivelMinimo,
            'nivel_maximo_humedad' => $nivelMaximo
        ]);
    } else {
        echo "Error al agregar la configuración.";
    }
}
}


      