<?php

namespace App\Controllers;

class CData extends BaseController
{

    public function datos()
    {
        if ($this->request->getMethod() === 'post') {
            $dispositivoID = $this->request->getPost('dispositivo_id');
            $ipAddress = $this->request->getPost('ip_address');
    
            return $this->response->setJSON([
                'status' => 'success',
                'dispositivo_id' => $dispositivoID,
                'ip_address' => $ipAddress
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
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Método GET recibido correctamente'
        ]);
    }
}

