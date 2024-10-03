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

        // Validar que el nombre de la planta solo contenga letras
        if (!preg_match('/^[a-zA-Z\s]+$/', $nombrePlanta)) {
            session()->set('error', 'El nombre de la planta solo puede contener letras.');
            return redirect()->back()->withInput(); // Redirecciona y mantiene los valores del formulario
        }

        // Asegurarse de que se pasan los valores correctos
        $array = [
            'nombre_planta' => $nombrePlanta,
            'id_ubicacion' => $ubicacion
        ];

        // Intenta insertar los datos
        $plantaModel = new PlantaModel();
        if ($plantaModel->insertDatos($array)) {
            // Establece el mensaje de éxito si se inserta correctamente
            session()->set('exito', 'Planta creada correctamente.');
        } else {
            // Establece un mensaje de error si falla la inserción
            session()->set('error', 'Error al crear la planta. Intenta nuevamente.');
        }

        // Redirecciona a la página de "mi-planta"
        return redirect()->to('mi-planta');
    }
}

    
}
