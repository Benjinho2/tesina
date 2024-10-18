<?php

namespace App\Controllers;

class CData extends BaseController
{
    public function datos()
    {
        if ($this->request->getMethod() === 'post') {
            $humedad = $this->request->getPost('humedad');
            $fecha = $this->request->getPost('fecha');

            // Aquí puedes agregar la lógica para almacenar los datos en la base de datos
            $data = [
                'humedad' => $humedad,
                'fecha' => $fecha
            ];

            // Supongamos que tienes un modelo de base de datos llamado HistorialRiegoModel

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Datos recibidos y almacenados correctamente',
                'data' => $data
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Método no permitido'
            ]);
        }
    }

    public function getDatos()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Método GET recibido correctamente',
            'data' => [
                'example_data' => 'Aquí puedes agregar más datos si lo necesitas'
            ]
        ]);
    }
}
