<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;

class CConfiguracion extends BaseController
{
    // Método para obtener la configuración de la planta
    public function configuracion($id_planta)
    {
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->where('id_planta', $id_planta)->first();

        if ($configuracion) {
            return $this->response->setJSON([
                'nivel_minimo_humedad' => $configuracion['nivel_minimo_humedad'],
                'nivel_maximo_humedad' => $configuracion['nivel_maximo_humedad']
            ]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No se encontró configuración']);
        }
    }

    // Método para guardar la configuración de humedad
    public function guardarConfiguracion()
    {
        $id_planta = $this->request->getPost('id_planta');
        $nivelMinimo = $this->request->getPost('nivel_minimo_humedad');
        $nivelMaximo = $this->request->getPost('nivel_maximo_humedad');

        // Validar datos
        if (!$id_planta || !$nivelMinimo || !$nivelMaximo) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Datos incompletos']);
        }

        $configuracionModel = new ConfiguracionModel();
        $array = [
            'id_planta' => $id_planta,
            'nivel_minimo_humedad' => $nivelMinimo,
            'nivel_maximo_humedad' => $nivelMaximo
        ];

        if ($configuracionModel->save($array)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Configuración guardada correctamente']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Error al guardar configuración']);
        }
    }
}
