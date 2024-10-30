<?php 
namespace App\Controllers;

use App\Models\PlantaModel;
use App\Models\UbicacionModel;
use App\Models\ConfiguracionModel;
use App\Models\MedicionModel;
use CodeIgniter\Controller;

class CPlanta extends Controller
{
    public function miplanta()
    {
        // Verifica si el usuario ya está autenticado
        if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }
        // Funcionalidad para solicitudes GET (o si no es POST)
        $plantaModel = new PlantaModel();
        $ubicacionModel = new UbicacionModel();

        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
        // Llama al método que obtiene las plantas con la ubicación
        $data['plantas'] = $plantaModel->obtenerPlantasConUbicacion($id_usuario);

        foreach ($data['plantas'] as &$planta) {
            // Cambia el texto según el booleano
            $planta['tipo_lugar'] = $planta['lugar_planta'] ? 'Interior' : 'Exterior';
        }

        // Obtener todas las ubicaciones para el formulario
        $data['ubicaciones'] = $ubicacionModel->findAll();

        return view('mi-planta', $data);
    }

    public function crearPlanta()
    {
        $plantaModel = new PlantaModel;
        $ubicacionModel = new UbicacionModel;
        
        // Obtener datos del formulario
        $nombre_planta = $this->request->getPost('nombre_planta');
        $id_ubicacion = $this->request->getPost('ubicacion');
        $datosUsuario = session()->get('DatosUsuario');
        
        if (isset($datosUsuario['id_usuario'])) {
            $id_usuario = $datosUsuario['id_usuario'];
    
            // Insertar la nueva planta
            $array = [
                'nombre_planta' => $nombre_planta,
                'id_ubicacion' => $id_ubicacion,
                'id_usuario' => $id_usuario
            ];
    
            if ($plantaModel->insertarDatos($array)) {
                // Redireccionar y mostrar mensaje de éxito
                session()->setFlashdata('exito', 'Planta creada exitosamente.');
                return redirect()->to('mi-planta');
            }
        } else {
            session()->setFlashdata('error', 'No se encontró el usuario en la sesión.');
            return redirect()->to('login'); // Redirecciona al login si no hay sesión activa
        }
    
        return view('mi-planta');
    }
    
    public function eliminarPlanta($id_planta)
    {
        $plantaModel = new PlantaModel();
        $configuracionModel = new ConfiguracionModel();
        $medicionModel = new MedicionModel();
        
        // Obtener el id del usuario de la sesión
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
    
        // Verificar que la planta pertenezca al usuario actual
        $planta = $plantaModel->obtenerPlantaPorIdYUsuario($id_planta, $id_usuario);
    
        if ($planta) {
            // Eliminar todas las configuraciones asociadas a la planta
            $configuracionModel->eliminarConfiguracionesPorPlanta($id_planta);
    
            // Eliminar todas las mediciones asociadas a la planta
            $medicionModel->eliminarMedicionesPorPlanta($id_planta);
    
            // Eliminar la planta
            if ($plantaModel->delete($id_planta)) {
                session()->setFlashdata('exito', 'Planta eliminada exitosamente.');
            } else {
                session()->setFlashdata('error', 'Error al eliminar la planta.');
            }
        } else {
            session()->setFlashdata('error', 'No tienes permiso para eliminar esta planta.');
        }
    
        return redirect()->to('mi-planta');
    }
    


}

