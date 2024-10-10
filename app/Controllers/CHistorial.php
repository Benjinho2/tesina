<?php 
namespace App\Controllers;
use App\Models\PlantaModel; // Modelo para plantas
use App\Models\HistorialModel;  // Modelo para registros de riego
use CodeIgniter\Controller;

class CHistorial extends Controller
{
    public function historial($id_planta)
    {
        // Verifica si el usuario está autenticado
        if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }

        $plantaModel = new PlantaModel();
        $riegosModel = new HistorialModel(); // Instancia del modelo de riegos
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
        $planta = $plantaModel->obtenerPlantaPorIdYUsuario($id_planta, $id_usuario);

        // Verificar si la planta existe y pertenece al usuario
        if (!$planta) {
            session()->setFlashdata('error', 'No se encontró la planta o no tienes permisos para configurarla.');
            return redirect()->to('/mi-planta');
        }

        // Obtener riegos para la planta específica
        $datos['riegos'] = $riegosModel->getRiegosByPlanta($id_planta);
        $datos['planta'] = $planta;

        return view('historial', $datos);
    }

}