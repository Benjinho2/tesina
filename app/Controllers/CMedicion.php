<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MedicionModel;

class CMedicion extends Controller
{
    // Método para recibir la medición de humedad del sensor
    public function recibirMedicion()
    {
        // Recibir datos de la solicitud POST
        $id_planta = $this->request->getPost('id_planta');
        $humedad = $this->request->getPost('humedad');
        $id_usuario = $this->request->getPost('id_usuario');
        
        // Validar los datos (por ejemplo, asegurarse de que la humedad esté en el rango adecuado)
        if (is_numeric($humedad) && $humedad >= 0 && $humedad <= 100) {
            // Guardar la medición en la base de datos
            $medicionModel = new MedicionModel();
            $data = [
                'id_planta' => $id_planta,
                'humedad' => $humedad,
                'id_usuario' => $id_usuario,
                'fecha' => date('Y-m-d H:i:s')
            ];
            $medicionModel->save($data);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Medición recibida correctamente']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Valor de humedad no válido']);
        }
    }

    // Método para mostrar las mediciones específicas según el ID de la planta
    public function mostrarMediciones($id_planta)
    {
        $medicionModel = new MedicionModel();
        $mediciones = $medicionModel->obtenerMedicionesPorPlanta($idPlanta);
        
        // Verificamos que haya mediciones
        if (!empty($mediciones)) {
            // Mapeamos solo los campos necesarios (id_planta, humedad, id_usuario y fecha)
            $resultados = array_map(function($medicion) {
                return [
                    'id_planta' => $medicion['id_planta'],
                    'humedad' => $medicion['humedad'],
                    'id_usuario' => $medicion['id_usuario'],
                    'fecha' => $medicion['fecha']
                ];
            }, $mediciones);

            return $this->response->setJSON($resultados);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No se encontraron mediciones']);
        }
    }

    // Método para mostrar el historial de mediciones en la vista
    public function historialMediciones($id_planta)
    {
        $medicionModel = new MedicionModel();
        
        $mediciones = $medicionModel->obtenerUltimasMediciones($id_planta);

        // Verificar si existen mediciones
        if (empty($mediciones)) {
            return redirect()->to('/mi-planta')->with('error', 'No se encontraron mediciones para esta planta');
        }
    
        // Pasar los datos a la vista
        return view('historial-mediciones', [
            'mediciones' => $mediciones
        ]);
    }
    
}
