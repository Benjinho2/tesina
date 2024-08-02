<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class CNuevacontrasena extends Controller{
    public function index()
    {
        return view('autenticacion/nueva-contrasena');
    }
}