<?php 

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\PlantaModel;
use CodeIgniter\Controller;

class CConfiguracion extends Controller
{   
    public function configuracion($id_planta)
{
    // Verifica si el usuario ya está autenticado
    if (!session()->get('DatosUsuario')) {
        return redirect()->to('/');
    }

    $plantaModel = new PlantaModel;
    $id_usuario = session()->get('DatosUsuario')['id_usuario'];
    $planta = $plantaModel->obtenerPlantaPorIdYUsuario($id_planta, $id_usuario);

    if (!$planta) {
        session()->setFlashdata('error', 'No se encontró la planta o no tienes permisos para configurarla.');
        return redirect()->to('/mi-planta');
    }

    // Cargar la vista de configuración con los datos de la planta
    $datos['planta'] = $planta; // Pasar los datos de la planta a la vista
    return view('configuracion', $datos);
}

public function guardarConfiguracion()
{
    // Obtener datos del formulario
    $id_dispositivo = 2;
    $id_planta = $this->request->getPost('id_planta'); // Asegúrate de que el ID de la planta se envíe en el formulario
    $nivelMinimo = $this->request->getPost('nivel_minimo_humedad');
    $nivelMaximo = $this->request->getPost('nivel_maximo_humedad');

    // Guardar la configuración en la base de datos
    $configuracionModel = new ConfiguracionModel(); // Asegúrate de que este modelo esté correctamente configurado

    $array = [
        'id_dispositivo' => $id_dispositivo,
        'id_planta' => $id_planta,
        'nivel_minimo_humedad' => $nivelMinimo,
        'nivel_maximo_humedad' => $nivelMaximo,
    ];

    // Asegúrate de que el método guardarConfiguracion esté implementado en el modelo
    if ($configuracionModel->guardarConfiguracion($array)) {
        session()->setFlashdata('exito', 'Configuración de humedad guardada correctamente.');
    } else {
        session()->setFlashdata('error', 'Error al guardar la configuración de humedad.');
    }

    return redirect()->to('/mi-planta');
}

    
}

      