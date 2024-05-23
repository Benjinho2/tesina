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

    }
}
