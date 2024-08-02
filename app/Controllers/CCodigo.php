<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class CCodigo extends Controller{
    
    public function index()
    {
        return view('autenticacion/codigo');
    }

    public function verificar()
    {
        $codigoIngresado = $this->request->getPost('codigo');
        $codigoSesion = session()->get('verificacion_codigo');
        $emailSesion = session()->get('email');

        if ($codigoIngresado == $codigoSesion) {
            return redirect()->to(base_url('nueva_contrasena'));
        } else {
            // Generar un nuevo código de verificación
            $nuevoCodigo = rand(100000, 999999);
            session()->set('verificacion_codigo', $nuevoCodigo);

            // Enviar el nuevo código de verificación por correo electrónico
            $email = Services::email();
            $email->setFrom('aquabotinfo@gmail.com', 'AquaBot');
            $email->setTo($emailSesion);
            $email->setSubject('Nuevo Código de Verificación');
            $email->setMessage("Su nuevo código de verificación es: $nuevoCodigo");

            if ($email->send()) {
                return redirect()->back()->with('error', 'Código de verificación incorrecto. Se ha enviado un nuevo código a su correo.');
            } else {
                return redirect()->back()->with('error', 'Código de verificación incorrecto y error al enviar el nuevo código.');
            }
        }
    }
}