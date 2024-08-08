<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

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

    public function registrarse()
    {
        $usuarioModel   = new UsuarioModel();
    
        $nombre         = $this->request->getPost('nombre');
        $apellido       = $this->request->getPost('apellido');
        $email          = $this->request->getPost('email');
        $contraseña     = $this->request->getPost('contraseña');
    
          // Validación de nombre completo (solo letras)
        if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
            return redirect()->to('autenticacion/register')->with('error', 'El nombre y apellido solo puede contener letras');
        }
        
          // Validación de apellido (solo letras)
          if (!preg_match('/^[a-zA-Z\s]+$/', $apellido)) {
            return redirect()->to('autenticacion/register')->with('error', 'El apellido solo puede contener letras');
        }

         // Validar que las contraseñas tengan al menos 6 caracteres, una mayúscula y un símbolo
         if (strlen($contraseña) < 6 || !preg_match('/[A-Z]/', $contraseña) || !preg_match('/[!@#$%]/', $contraseña)) {
            return redirect()->back()->with('error', 'La nueva contraseña debe tener al menos 6 caracteres, una letra mayúscula y un símbolo(!@#$%).');
        }
        
        if ($usuarioModel ->existenteEmail($email)) {
            return redirect()->to('autenticacion/register')->with('error', 'El correo electrónico ya está registrado');
        }
    
        $array = [
            'nombre'          => $nombre,
            'apellido'        => $apellido,
            'email'           => $email,
            'contraseña'      => password_hash($contraseña, PASSWORD_BCRYPT),
        ];
    
        if ($usuarioModel->insertarUsuario($array)) {
            return redirect()->to('autenticacion/login')->with('exito', '¡Ahora estás registrado/a!');
        }
    }
    
    public function iniciarSesion()
    {   
        $usuarioModel = new UsuarioModel();

        $email      = $this->request->getPost('email');
        $contraseña = $this->request->getPost('contraseña');

        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($email);

        if ($informacionUsuario === null || !password_verify($contraseña, $informacionUsuario['contraseña'])) {
            return redirect()->to('autenticacion/login')->with('error', 'Correo electrónico o contraseña incorrecto');
        }
        session()->set('Tipo', 'Usuario');
        session()->set('userData', $informacionUsuario);
        return redirect()->to('/');
    }
    
    public function cerrarSesion()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}

?>
