<?php 

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\PlantaModel;
use CodeIgniter\Controller;

class CConfiguracion extends Controller
{   
    public function configuracion($id_planta = 7) // ID de planta fijo
    {
        // Verifica si el usuario ya está autenticado
        if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }

        $plantaModel = new PlantaModel;
        $id_usuario = 5; // ID de usuario fijo
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
        $id_dispositivo = 1; // ID de dispositivo fijo
        $id_planta = 7; // ID de planta fijo
        $nivelMinimo = $this->request->getPost('nivel_minimo_humedad');
        $nivelMaximo = $this->request->getPost('nivel_maximo_humedad');

        // Guardar la configuración en la base de datos
        $configuracionModel = new ConfiguracionModel();

        $array = [
            'id_dispositivo' => $id_dispositivo,
            'id_planta' => $id_planta,
            'nivel_minimo_humedad' => $nivelMinimo,
            'nivel_maximo_humedad' => $nivelMaximo,
        ];

        if ($configuracionModel->guardarConfiguracion($array)) {
            session()->setFlashdata('exito', 'Configuración de humedad guardada correctamente.');
        } else {
            session()->setFlashdata('error', 'Error al guardar la configuración de humedad.');
        }

        return redirect()->to('/mi-planta');
    }
}
