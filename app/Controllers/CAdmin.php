<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class CAdmin extends BaseController
{   
    // public function nuevoAdmin()
    // {
    //     return view('admin/nuevoadmin');
    // }

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $DatosUsuario = session()->get('userData');

        $array = [
            'userAdmin' => $DatosUsuario
        ];

        return view('admin/index', $array);
    }
    
}   
