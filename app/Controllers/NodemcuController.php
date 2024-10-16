<?php

namespace App\Controllers;

class NodemcuController extends BaseController
{
    public function recibirDatos()
    {
        $ssid = $this->request->getPost('ssid');
        $password = $this->request->getPost('password');
        $humidity = $this->request->getPost('humidity');

        session()->set('ssid', $ssid);
        session()->set('password', $password);
        session()->set('humidity', $humidity);

        echo "Datos recibidos de la NodeMCU:<br>";
        echo "SSID: " . esc($ssid) . "<br>";
        echo "Contraseña: " . esc($password) . "<br>";
        echo "Humedad: " . esc($humidity) . "<br>";
    }

    public function mostrarDatos()
    {
     
        $ssid = session()->get('ssid');
        $password = session()->get('password');
        $humidity = session()->get('humidity');

        return view('datos_nodemcu', [
            'ssid' => $ssid,
            'password' => $password,
            'humidity' => $humidity
        ]);
    }
}
