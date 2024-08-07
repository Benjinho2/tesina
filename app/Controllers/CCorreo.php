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

    public function correo() {
        $usuarioModel = new UsuarioModel();

        $emailUsuario = $this->request->getPost('email');

        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($emailUsuario);

        if ($informacionUsuario) {
            $verificacionCodigo = rand(100000, 999999);

            // Guardar el código en la base de datos
            $array = [
                'id_usuario'          => $informacionUsuario['id_usuario'],
                'codigo_verificacion' => $verificacionCodigo,
            ];

            $codigoModel = new CodigoModel();
            $codigoModel->insertarDatosCodigo($array);

            $email = Services::email();
            $email->setFrom('aquabotinfo@gmail.com', 'AquaBot');
            $email->setTo($emailUsuario);
            $email->setSubject('Código de Verificación');
            $email->setMessage("Su código de verificación es: $verificacionCodigo");

            if ($email->send()) {
                return redirect()->to('autenticacion/nueva-contrasena');
            } else {
                return redirect()->back()->with('error', 'Error al enviar el correo');
            }
        } else {
            return redirect()->back()->with('error', 'Correo no encontrado');
        }
    }

}