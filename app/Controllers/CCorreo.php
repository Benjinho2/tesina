<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\CodigoModel;
use Config\Services;

class CCorreo extends Controller{
    
    public function index()
    {
        return view ('autenticacion/correo');  
    }

    public function info()
    {
        return view ('autenticacion/info');  
    }


    public function correo() {
        $usuarioModel = new UsuarioModel();
        $codigoModel = new CodigoModel();

        $emailUsuario = $this->request->getPost('email');
        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($emailUsuario);

        if ($informacionUsuario) {
            $token = bin2hex(random_bytes(16)); // Generar un token único
            $expiresAt = date('Y-m-d H:i:s', strtotime('+15 minutes')); // Token válido por 15 minutos

            $array = [
                'id_usuario' => $informacionUsuario['id_usuario'],
                'token' => $token,
                'token_expires' => $expiresAt
            ];

            $codigoModel->insertarToken($array);

            // Construir la URL segura con el token
            $baseURL = base_url();
            $url = $baseURL . '/autenticacion/nueva-contrasena';

            // Enviar el correo
            $email = Services::email();
            $email->setFrom('aquabotinfo@gmail.com', 'AquaBot');
            $email->setTo($emailUsuario);
            $email->setSubject('Restablecimiento de Contraseña');
            $email->setMessage("Para restablecer su contraseña, haga clic en el siguiente enlace: " . $url . " y use el siguiente código de verificación: $token.");

            if ($email->send()) {
                return redirect()->to('autenticacion/info')->with('exito', 'Se ha enviado un correo para restablecer su contraseña.');
            } else {
                return redirect()->back()->with('error', 'Error al enviar el correo');
            }
        } else {
            return redirect()->back()->with('error', 'Correo no encontrado');
        }
    }
}
