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

    
    public function registro()
    {
        $validacion = $this->validate([
            'nombre_completo' =>[
                'rules' =>'required',
                'errors' =>[
                    'required' =>'Su Nombre completo es requerido'
                ]
                ],

            'email' =>[
                'rules' =>'required|valid_email|is_unique[usuarios.email]',
                'errors' =>[
                    'required' =>'Correo electrónico es requerido',
                    'valid_email' =>'Debe ingresar un correo electrónico válido, por ejemplo:@gmail.com',
                    'is_unique' =>'Correo electrónico ya está registrado'
                ]
                ],
            'contraseña' =>[
                'rules' =>'required|min_length[5]|max_length[12]',
                'errors' =>[
                    'required' =>'Se requiere Contraseña',
                    'min_length' =>'La Contraseña debe tener al menos 5 caracteres de longitud.',
                    'max_length' =>'La Contraseña no debe tener más de 12 caracteres de longitud'
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
            

            $UsuarioModel = new \App\Models\UsuarioModel();
            $query = $UsuarioModel->insert($array);
            if(!$query){
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
                    'required' => 'Se requiere Correo electrónico',
                    'valid_email' => 'Introduzca una dirección de Correo Electrónico válida',
                    'is_not_unique' => 'Este Correo Electrónico no está registrado en nuestro servicio.'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Se requiere Contraseña',
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
            $contraseña = $this->request->getPost('contraseña');
            $usuarioModel = new \App\Models\UsuarioModel();
            $informacion_usuario = $usuarioModel->where('email', $email)->first();
            
            if (!$informacion_usuario) {
                return redirect()->to('/autenticacion/login');
            }
            
            $verificar_contraseña = password_verify($contraseña, $informacion_usuario['contraseña']);
            
            if (!$verificar_contraseña) {
                session()->setFlashdata('fail', 'Contraseña Incorrecta');
                return redirect()->to('/autenticacion/login');
            } else {
                // Aquí podrías configurar la sesión del usuario si todo es correcto
                session()->set('user_id', $informacion_usuario['id_usuario']);
                return redirect()->to('/');
            }
        }
    }
}
