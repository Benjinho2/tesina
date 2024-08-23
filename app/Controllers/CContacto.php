<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use Config\Services;

class CContacto extends Controller{

    public function enviar()
    {   
        $nombre  = $this->request->getPost('nombre');
        $emails  = $this->request->getPost('email');
        $mensaje = $this->request->getPost('mensaje');

        $usuarioModel = new UsuarioModel();
        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($emails);

        // Verificar si el correo existe en la base de datos
        if (!$informacionUsuario) {
            return redirect()->back()->with('error', 'El correo electrónico no está registrado.');
        }

        $email = Services::email();
        $email->setFrom($emails);
        $email->setTo('aquabotinfo@gmail.com');
        $email->setSubject($nombre);
        $email->setMessage($mensaje);

        if ($email->send()) {
            return redirect()->back()->with('exito', 'Correo enviado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Error al enviar el correo');
        }
    }
}
