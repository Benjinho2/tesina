<?php

namespace App\Controllers;

class CAutenticacion extends BaseController
{
    public function login()
    {
        return view('autenticacion/login');
    }

    public function register()
    {
        return view('autenticacion/register');
    }

    
    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Aquí deberías validar las credenciales (por ejemplo, consultando una base de datos)
        // Este es solo un ejemplo básico
        if ($username === 'admin' && $password === 'password') {
            // Usuario autenticado, redirigir a la página de inicio o a otra página
            return redirect()->to('/home');
        } else {
            // Credenciales incorrectas, mostrar mensaje de error
            return view('login', ['error' => 'Username or password is incorrect.']);
        }
    }
}
