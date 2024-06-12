<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class CContacto extends Controller{

    public function enviar()
    {
        $nombre  = $this->request->getPost('nombre');
        $emails  = $this->request->getPost('email');
        $mensaje = $this->request->getPost('mensaje');

        $email   = \Config\Services::email();
        
        $email->setFrom($emails);
        $email->setTo('aquabotinfo@gmail.com');
        $email->setSubject($nombre);
        $email->setMessage($mensaje);

          if ($email->send()) {
            return redirect()->back()->with('success', 'Correo enviado exitosamente');
        } else {
            return redirect()->back()->with('fail', 'Error al enviar el correo');
        }
    }
}