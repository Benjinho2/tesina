<?php 
namespace App\Controllers;

use App\Models\PlantaModel;
use App\Models\UbicacionModel;
use CodeIgniter\Controller;

class CPlanta extends Controller
{
    public function miplanta()
    {
        // Verifica si el usuario ya está autenticado
        if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }
    
        $plantaModel = new PlantaModel();
        $ubicacionModel = new UbicacionModel();
    
        $id_usuario = session()->get('DatosUsuario')['id_usuario'];
        // Llama al método que obtiene las plantas con la ubicación
        $data['plantas'] = $plantaModel->getPlantasConUbicacion($id_usuario);
    
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
        if ($this->request->getMethod() === 'post') {
            $nombrePlanta = $this->request->getPost('nombre_planta');
            $ubicacion = $this->request->getPost('ubicacion');
            $idUsuario = session()->get('id_usuario'); // Asegúrate de que el usuario esté en sesión
    
            // Validación simple para asegurar que no esté vacío
            if (empty($nombrePlanta) || empty($ubicacion)) {
                session()->set('error', 'Todos los campos son obligatorios.');
                return redirect()->back();
            }
    
            // Prepara los datos para la inserción
            $data = [
                'nombre_planta' => $nombrePlanta,
                'id_ubicacion' => $ubicacion,
                'id_usuario' => $idUsuario // Asegúrate de que este campo esté correcto
            ];
    
            // Llamada al modelo para insertar los datos
            $plantaModel = new PlantaModel();
    
            // Intentar insertar los datos
            if ($plantaModel->insert($data)) {
                session()->set('exito', 'Planta creada correctamente.');
            } else {
                session()->set('error', 'Error al crear la planta.');
            }
    
            return redirect()->to('mi-planta');
        }
    }
    

    
}
