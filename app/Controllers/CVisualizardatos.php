<?php 
namespace App\Controllers;
use App\Models\PlantaModel;
use CodeIgniter\Controller;

class CVisualizardatos extends Controller
{
    public function visualizarDatos($id_planta)
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

        return view('visualizarDatos',$datos);
    }
}