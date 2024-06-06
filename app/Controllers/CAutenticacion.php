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
        $UsuarioModel = new UsuarioModel();
    
        $nombreCompleto = $this->request->getPost('nombre_completo');
        $email = $this->request->getPost('email');
        $contraseña = $this->request->getPost('contraseña');
    
        if ($UsuarioModel->existenteEmail($email)) {
            return redirect()->to('autenticacion/register')->with('fail', 'El correo electrónico ya está registrado');
        }
    
        $array = [
            'nombre_completo' => $nombreCompleto,
            'email' => $email,
            'contraseña' => password_hash($contraseña, PASSWORD_BCRYPT),
        ];
    
        if ($UsuarioModel->insertarUsuario($array)) {
            return redirect()->to('autenticacion/register')->with('success', '¡Ahora estás registrado/a!');
        }
    }
    

    public function iniciarSesion()
    {
        $UsuarioModel = new UsuarioModel();
    
        $email = $this->request->getPost('email');
        $contraseña = $this->request->getPost('contraseña');
    
        $informacion_usuario = $UsuarioModel->ObtenerUsuarioEmail($email);
    
        if ($informacion_usuario && password_verify($contraseña, $informacion_usuario['contraseña'])) {
            session()->set('Tipo', 'Usuario');
            session()->set('userData', $informacion_usuario); 
                return redirect()->to('/');
        } else {
            session()->setFlashdata('fail', 'Correo electrónico o contraseña incorrecto');
            return redirect()->to('autenticacion/login');
        }
    }
    

    public function cerrarSesion()
    {
        session()->destroy();
        
        return redirect()->to('/');
    }
}


?>