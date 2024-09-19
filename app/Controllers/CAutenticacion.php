<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class CAutenticacion extends BaseController
{   
    public function login()
    {
        // Verifica si el usuario ya está autenticado
        if (session()->get('DatosUsuario')) {
            // Redirige al usuario autenticado a la página principal
            return redirect()->to('/');
        }

        return view('autenticacion/login');
    }

    public function register()
    {
        // Verifica si el usuario ya está autenticado
        if (session()->get('DatosUsuario')) {
            // Redirige al usuario autenticado a la página principal
            return redirect()->to('/');
        }
        return view('autenticacion/register');
    }

    public function registrarse()
    {
        $usuarioModel   = new UsuarioModel();
    
        $nombre         = $this->request->getPost('nombre');
        $apellido       = $this->request->getPost('apellido');
        $email          = $this->request->getPost('email');
        $contraseña     = $this->request->getPost('contraseña');
    
        // Validación de nombre completo (solo letras)
        if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
            session()->set('error', 'El nombre y apellido solo puede contener letras.');
            return redirect()->to('autenticacion/register');
        }
        
        // Validación de apellido (solo letras)
        if (!preg_match('/^[a-zA-Z\s]+$/', $apellido)) {
            session()->set('error', 'El apellido solo puede contener letras.');
            return redirect()->to('autenticacion/register');
        }

        if ($usuarioModel->existenteEmail($email)) {
            session()->set('error', 'El correo electrónico ya está registrado.');
            return redirect()->to('autenticacion/register');
        }

        // Validar que las contraseñas tengan al menos 6 caracteres, una mayúscula y un símbolo
        if (strlen($contraseña) < 6 || !preg_match('/[A-Z]/', $contraseña) || !preg_match('/[!@#$%]/', $contraseña)) {
            session()->set('error', 'La nueva contraseña debe tener al menos 6 caracteres, una letra mayúscula y un símbolo (!@#$%).');
            return redirect()->back();
        }
        
        $array = [
            'nombre'          => $nombre,
            'apellido'        => $apellido,
            'email'           => $email,
            'contraseña'      => password_hash($contraseña, PASSWORD_BCRYPT),
        ];
    
        if ($usuarioModel->insertarUsuario($array)) {
            session()->set('exito', 'Usuario registrado.');     
            return redirect()->to('autenticacion/login');   
        }
    }
    
    public function iniciarSesion()
    {   
        $usuarioModel = new UsuarioModel();

        $email      = $this->request->getPost('email');
        $contraseña = $this->request->getPost('contraseña');

        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($email);

        if ($informacionUsuario === null || !password_verify($contraseña, $informacionUsuario['contraseña'])) {
            session()->set('error', 'Correo electrónico o contraseña incorrecto.');
            return redirect()->to('autenticacion/login');
        }
        session()->set('Tipo', 'Usuario');
        session()->set('DatosUsuario', $informacionUsuario);
        return redirect()->to('/');
    }
    
    public function cerrarSesion()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
