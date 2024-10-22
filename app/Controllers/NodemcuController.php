<?php

namespace App\Controllers;

class NodemcuController extends BaseController
{
    public function recibirDatos()
    {
        $ssid = $this->request->getPost('ssid');
        $password = $this->request->getPost('password');
        $humidity = $this->request->getPost('humidity');

        // Verifica si llegan los datos correctamente
        if ($ssid && $password && $humidity) {
            session()->set('ssid', $ssid);
            session()->set('password', $password);
            session()->set('humidity', $humidity);
            return redirect()->to('/mostrar-datos'); // Redirigir después de guardar
        } else {
            return "No se han recibido datos válidos.";
        }
    }

    public function mostrarDatos()
    {
        $ssid = session()->get('ssid');
        $password = session()->get('password');
        $humidity = session()->get('humidity');

        // Verifica si hay datos en la sesión
        if ($ssid && $password && $humidity) {
            return view('ver_datos_nodemcu', [
                'ssid' => $ssid,
                'password' => $password,
                'humidity' => $humidity
            ]);
        } else {
            return "No hay datos disponibles.";
        }
    }
}

    
