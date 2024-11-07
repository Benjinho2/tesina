<?php

namespace App\Controllers;

use App\Models\MedicionModel;
use App\Models\PlantaModel; // Modelo para plantas

class CMedicion extends BaseController
{
    public function mostrarMediciones($id_planta) {
           // Verifica si el usuario está autenticado
           if (!session()->get('DatosUsuario')) {
            return redirect()->to('/');
        }
            
        $medicionModel = new MedicionModel();
        
        // Obtener las últimas 10 mediciones, ordenadas por fecha (o el campo correspondiente)
        $data['mediciones'] = $medicionModel->getUltimasMediciones(10);        

        return view('mediciones', $data);
    }

    public function recibirMedicion()
    {
        $id_planta = $this->request->getPost('id_planta');
        $humedad = $this->request->getPost('humedad');
        $id_usuario = $this->request->getPost('id_usuario');

        // Validar si los datos son nulos
        if ($id_planta !== null && $humedad !== null && $fecha!== null) {
            // Guardar la medición en la base de datos
            $medicionModel = new MedicionModel();
            $medicionModel->save([
                'id_planta' => $id_planta,
                'humedad' => $humedad,
                'fecha' => $fecha
            ]);
            // Devuelve una respuesta exitosa
            return $this->response->setJSON(['status' => 'success', 'message' => 'Medición registrada']);
        } else {
            // Devuelve un error si los datos son nulos
            return $this->response->setJSON(['status' => 'error', 'message' => 'Datos incompletos']);
        }
    }

    
}

