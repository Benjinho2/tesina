<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('inicio');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function sobrenosotros()
    {
        return view('sobrenosotros');
    }

    public function perfil()
    {
        // Verifica si el usuario ya está autenticado
        if (!session()->get('DatosUsuario')) 
        {
            // Redirige al usuario autenticado a la página principal

            return redirect()->to('/');
        }

        return view('perfil');
    }

    public function funcionamiento()
    {
        return view ('como-funciona');
    }

    public function consejo()
    {
        return view ('consejo-truco');
    }

    public function dispositivo()
    {
        return view('dispositivo');
    }

}



