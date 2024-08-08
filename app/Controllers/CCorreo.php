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
            $codigo = rand(100000, 999999); // Generar un código de 6 dígitos
            $expiresAt = date('Y-m-d H:i:s', strtotime('+15 minutes')); // Código válido por 15 minutos

            $array = [
                'id_usuario' => $informacionUsuario['id_usuario'],
                'codigo' => $codigo,
                'codigo_expires' => $expiresAt
            ];

            $codigoModel->insertarCodigo($array);

            // Enviar el correo
            $email = Services::email();
            $email->setFrom('aquabotinfo@gmail.com', 'AquaBot');
            $email->setTo($emailUsuario);
            $email->setSubject('Código de Verificación para Restablecer Contraseña');
            $email->setMessage("Use el siguiente código para restablecer su contraseña: $codigo. El código es válido por 15 minutos.");

            if ($email->send()) {
                return redirect()->to('autenticacion/nueva-contrasena')->with('exito', 'Ingresa el código enviado por email');
            } else {
                return redirect()->back()->with('error', 'Error al enviar el correo');
            }
        } else {
            return redirect()->back()->with('error', 'Correo no encontrado');
        }
    }
}
