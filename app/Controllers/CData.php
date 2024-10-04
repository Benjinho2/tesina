<?php

namespace App\Controllers;

class CData extends BaseController
{
        public function datos()
        {
            // Verifica si la solicitud es POST
            if ($this->request->getMethod() === 'post') {
                $dato1 = $this->request->getPost('dato1');
                $dato2 = $this->request->getPost('dato2');
    
                // Aquí puedes procesar los datos, por ejemplo, guardarlos en la base de datos
                // ...
    
                // Devuelve una respuesta en formato JSON
                return $this->response->setJSON([
                    'status' => 'success',
                    'dato1' => $dato1,
                    'dato2' => $dato2
                ]);
            } else {
                // Si no es una solicitud POST, devolver un error
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Método no permitido'
                ]);
            }
        }

        public function getDatos()
        {
            // Aquí puedes manejar la solicitud GET
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Método GET recibido correctamente'
            ]);
        }
}
