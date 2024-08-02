<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use Config\Services;

class CCorreo extends Controller{
    
    public function index()
    {
        return view ('autenticacion/correo');  
    }

    public function correo()
    {
        $emailUsuario = $this->request->getPost('email');
        $usuarioModel   = new UsuarioModel();

        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($emailUsuario);

        if ($informacionUsuario) {
            $verificacionCodigo = rand(100000, 999999);

            session()->set('codigo_verificacion', $verificacionCodigo);
            session()->set('email', $emailUsuario);

            $email = Services::email();
            $email->setFrom('aquabotinfo@gmail.com', 'AquaBot');
            $email->setTo($emailUsuario);
            $email->setSubject('Código de Verificación');
            $email->setMessage("Su código de verificación es: $verificacionCodigo");

            if ($email->send()) {
                return redirect()->to(base_url('codigo'));
            } else {
                return redirect()->back()->with('error', 'Error al enviar el correo');
            }
        } else {
            return redirect()->back()->with('error', 'Correo no encontrado');
        }
    }

}