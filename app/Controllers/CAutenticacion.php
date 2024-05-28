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

    public function registro()
    {
        $validacion = $this->validate([
            'nombre_completo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nombre completo es requerido'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Correo electrónico es requerido',
                    'is_unique' => 'El Correo electrónico ya está registrado'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Contraseña es requerida',
                    'min_length' => 'La Contraseña debe tener al menos 5 caracteres de longitud.',
                    'max_length' => 'La Contraseña no debe tener más de 12 caracteres de longitud'
                ]
            ],
        ]);

        if (!$validacion) 
        {
            return view('autenticacion/register', ['validacion' => $this->validator]);
        } else {
            $nombre_completo = $this->request->getPost('nombre_completo');
            $email = $this->request->getPost('email');
            $contraseña = $this->request->getPost('contraseña');

            $array = [
                'nombre_completo' => $nombre_completo,
                'email' => $email,
                'contraseña' => password_hash($contraseña, PASSWORD_DEFAULT),
            ];

            $UsuarioModel = new UsuarioModel();
            $query = $UsuarioModel->insert($array);
            if (!$query) {
                return redirect()->back()->with('fail', 'Algo salió mal');
            } else {
                return redirect()->to('autenticacion/register')->with('success', '¡Ahora estás registrado/a!');
            }
        }
    }

    public function logueo()
    {
        $validacion = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Se requiere correo electrónico',
                    'valid_email' => 'Introduzca una dirección de Correo Electrónico válida',
                    'is_not_unique' => 'Este Correo Electrónico no está registrado en nuestro servicio.'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Se requiere contraseña',
                    'min_length' => 'La Contraseña debe tener al menos 5 caracteres de longitud',
                    'max_length' => 'La Contraseña no debe tener más de 12 caracteres de longitud'
                ]
            ]
        ]);
    
        if (!$validacion) 
        {
            return view('autenticacion/login', ['validacion' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $contraseña = trim($this->request->getPost('contraseña'));
            $UsuarioModel = new \App\Models\UsuarioModel();
            $informacion_usuario = $UsuarioModel->where('email', $email)->first();
            
            if (!$informacion_usuario) {
                session()->setFlashdata('fail', 'Correo electrónico o contraseña incorrectos');
                return redirect()->to('autenticacion/login');
            }
    
            $verificar_contraseña = password_verify($contraseña, $informacion_usuario['contraseña']);
                
            if (!$verificar_contraseña) {
                session()->setFlashdata('fail', 'Contraseña Incorrecta');
                return redirect()->to('autenticacion/login');
            } else {
                $user_id = $informacion_usuario['id_usuario'];
                $rol = $informacion_usuario['rol'];

             
                if ($rol == 1) {

                    session()->set('Tipo', 'Admin');
                    $userData = $UsuarioModel->find($user_id);
                    session()->set('userData', $userData);
                    
                    return redirect()->to('/admin/index');
                } else {

                    session()->set('Tipo', 'Usuario');

                    $userData = $UsuarioModel->find($user_id);
                    session()->set('userData', $userData);
                    
                    return redirect()->to('/');
                }
            }
        }
    }
    
    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to('/?sesión=cerrada');
    }
}
