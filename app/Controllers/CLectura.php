<?php 
namespace App\Controllers;
use App\Models\LecturaModel; // Modelo para lecturas
use App\Models\PlantaModel; // Modelo para plantas
use CodeIgniter\Controller;

class CLectura extends Controller
{
    public function visualizarDatos($id_planta)
    {
        // Verifica si el usuario está autenticado
        if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }

        $plantaModel = new PlantaModel();
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
        $planta = $plantaModel->obtenerPlantaPorIdYUsuario($id_planta, $id_usuario);

        // Verificar si la planta existe y pertenece al usuario
        if (!$planta) {
            session()->setFlashdata('error', 'No se encontró la planta o no tienes permisos para configurarla.');
            return redirect()->to('/mi-planta');
        }

        // Consultar las lecturas de humedad para la planta
        $lecturaModel = new LecturaModel();
        $lecturas = $lecturaModel->obtenerLecturasPorPlanta($id_planta);

        // Pasar los datos de la planta y las lecturas a la vista
        $datos['planta'] = $planta;
        $datos['lecturas'] = $lecturas;

        return view('visualizarDatos', $datos);
    }
}
