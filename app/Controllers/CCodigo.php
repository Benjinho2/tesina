<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CodigoModel;
use App\Models\UsuarioModel;

class CCodigo extends Controller {
    
    public function index() {
        return view('autenticacion/codigo');
    }

    public function verificar() {
        $codigoIngresado = $this->request->getPost('codigo');

        // Cargar el modelo de Código
        $codigoModel = new CodigoModel();
        
        // Verificar el código en la base de datos
        $codigo = $codigoModel->verificarCodigoPorCodigo($codigoIngresado);

        if ($codigo) {
            // Código válido, obtener el usuario
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->find($codigo['id_usuario']);

            if ($usuario) {
                // Pasar id_usuario  a la vista de nueva contraseña
                return view('autenticacion/nueva-contrasena', ['id_usuario' => $codigo['id_usuario'],]);
            } else {
                return redirect()->back()->with('error', 'Usuario no encontrado.');
            }
        } else {
            // Código inválido
            return redirect()->back()->with('error', 'Código de verificación incorrecto.');
        }
    }
}
