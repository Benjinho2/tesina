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
            $ubicacion = $this->request->getPost('ubicacion'); // Asegúrate de que este valor no sea nulo
    
            // Asegúrate de que estás pasando este valor a la consulta de inserción
            $array = [
                'nombre_planta' => $nombrePlanta,
                'id_ubicacion' => $ubicacion // Aquí asignas el valor de ubicación
            ];
    
            // Inserta en la base de datos
            $plantaModel = new PlantaModel();
            $plantaModel->insertDatos($array);
    
            // Establece el mensaje de éxito
            session()->set('exito', 'Planta creada correctamente.');
    
            // Redirecciona a la vista mi-planta
            return redirect()->to('mi-planta');
        }
    }
    
}
