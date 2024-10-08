<?php 
namespace App\Controllers;

use App\Models\PlantaModel;
use App\Models\ConfiguracionModel;
use CodeIgniter\Controller;

class CPlanta extends Controller
{
    public function miplanta()
    {
        // Verifica si el usuario ya está autenticado
        if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }

        $plantaModel = new PlantaModel;
        // Obtener las plantas del usuario autenticado usando el método del modelo
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
        $data['plantas'] = $plantaModel->obtenerPlantasPorUsuario($id_usuario);

        return view('mi-planta', $data);
    }

    public function crearPlanta()
    {
        $plantaModel = new PlantaModel;
        // Obtener datos del formulario
        $nombre_planta = $this->request->getPost('nombre_planta');
        $id_ubicacion = $this->request->getPost('ubicacion');
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];

        // Insertar la nueva planta
        $array = [
            'nombre_planta' => $nombre_planta,
            'id_ubicacion' => $id_ubicacion,
            'id_usuario' => $id_usuario
        ];

        if($plantaModel->insertarDatos($array)){
        // Redireccionar y mostrar mensaje de éxito
            session()->setFlashdata('exito', 'Planta creada exitosamente.');
            return redirect()->to('mi-planta');
        }
    }

    public function eliminarPlanta($id_planta)
    {
        $plantaModel        = new PlantaModel;
        $configuracionModel = new ConfiguracionModel;
    
        // Obtener el id del usuario
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
    
        // Verificar que la planta pertenezca al usuario actual
        $planta = $plantaModel->obtenerPlantaPorIdYUsuario($id_planta, $id_usuario);
    
        if ($planta) {
            // Eliminar todas las configuraciones asociadas a la planta usando el método del modelo
            $configuracionModel->eliminarConfiguracionesPorPlanta($id_planta);
    
            // Eliminar la planta
            if ($plantaModel->delete($id_planta)) {
                session()->setFlashdata('exito', 'Planta eliminada exitosamente.');
            } else {
                session()->setFlashdata('error', 'Error al eliminar la planta.');
            }
        return redirect()->to('mi-planta');
        }
    }

}
