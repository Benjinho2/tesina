<?php  
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\CodigoModel;
use App\Controllers\CAutenticacion;
use Config\Services;

class CCorreo extends Controller{
    
    public function index()
    {
          // Verifica si hay datos de usuario en la sesión
        if (session()->get('DatosUsuario')) {
            // Redirige al usuario autenticado a la página principal
            return redirect()->to('/');
        }
        return view ('autenticacion/correo');  
    }

    public function correo() {
        $usuarioModel = new UsuarioModel();
        $codigoModel = new CodigoModel();
    
        $emailUsuario = $this->request->getPost('email');
        $informacionUsuario = $usuarioModel->obtenerUsuarioEmail($emailUsuario);
        session()->set('emailIngresado', $emailUsuario);
        if ($informacionUsuario) {
            // Verifica si el usuario ya tiene un código de recuperación
            $codigoData = $codigoModel->obtenerUsuarioPorCodigoPorId($informacionUsuario['id_usuario']);
    
            // Generar un nuevo código
            $codigo = rand(100000, 999999); // Generar un código de 6 dígitos
    
            if ($codigoData) {
                // Si ya tiene un código, actualizarlo
                $codigoModel->actualizarCodigo($informacionUsuario['id_usuario'], $codigo);
            } else {
                // Si no tiene un código, insertarlo
                $array = [
                    'id_usuario' => $informacionUsuario['id_usuario'],
                    'codigo' => $codigo,
                ];  
                $codigoModel->insertarCodigo($array);
            }
            
            // Enviar el correo
            $email = Services::email();
            $email->setFrom('aquabotinfo@gmail.com', 'AquaBot');
            $email->setTo($emailUsuario);
            $email->setSubject('Código de verificación para restablecer contraseña');
            $email->setMessage("Use el siguiente código para restablecer su contraseña: $codigo");
    
            if ($email->send()) {
                session()->set('exito',  'Ingresa el código enviado por email.');
                return redirect()->to('autenticacion/nueva-contrasena');
            } else {
                session()->set('error', 'Error al enviar el correo.');
                return redirect()->back();
            }
        } else {
            session()->set('error', 'Correo no encontrado.');
            return redirect()->back();
        }
    }
    
}
