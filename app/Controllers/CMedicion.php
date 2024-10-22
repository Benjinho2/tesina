<?php

namespace App\Controllers;

use App\Models\MedicionModel;

class CMedicion extends BaseController
{
    public function recibirMedicion()
    {
        $id_planta = $this->request->getPost('id_planta');
        $humedad = $this->request->getPost('humedad');
        $id_usuario = $this->request->getPost('id_usuario');

        // Validar si los datos son nulos
        if ($id_planta !== null && $humedad !== null && $id_usuario !== null) {
            // Guardar la medición en la base de datos
            $medicionModel = new MedicionModel();
            $medicionModel->save([
                'id_planta' => $id_planta,
                'humedad' => $humedad,
                'id_usuario' => $id_usuario,
            ]);
            // Devuelve una respuesta exitosa
            return $this->response->setJSON(['status' => 'success', 'message' => 'Medición registrada']);
        } else {
            // Devuelve un error si los datos son nulos
            return $this->response->setJSON(['status' => 'error', 'message' => 'Datos incompletos']);
        }
    }

    public function mostrarMediciones()
    {
        $medicionModel = new MedicionModel();
        $data['mediciones'] = $medicionModel->getMediciones();
        return view('mediciones', $data);
    }
}
