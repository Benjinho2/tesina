<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\CodigoModel;
use App\Controllers\CAutenticacion;
class CNuevacontrasena extends Controller
{
    public function index()
    {  
          // Verifica si hay datos de usuario en la sesión
        if (!session()->get('emailIngresado')) {
            // Redirige al usuario autenticado a la página principal
            return redirect()->to('/');
        }

        return view('autenticacion/nueva-contrasena');
    }

    public function actualizar()
    {
        $usuarioModel = new UsuarioModel();
        $codigoModel = new CodigoModel();

        $codigo = $this->request->getPost('codigo');
        $nuevaContrasena = $this->request->getPost('nueva_contrasena');
        $confirmarContrasena = $this->request->getPost('confirmar_contrasena');

        // Verificar el código
        $codigoData = $codigoModel->obtenerUsuarioPorCodigo($codigo);

        if (!$codigoData) {
            session()->set('error', 'Código inválido o expirado.');
            return redirect()->back();
        }

        $idUsuario = $codigoData['id_usuario'];

        // Verificar que la nueva contraseña no sea igual a la antigua
        $usuario = $usuarioModel->find($idUsuario);
        if (password_verify($nuevaContrasena, $usuario['contraseña'])) {
            session()->set('error', 'La nueva contraseña no puede ser igual a la contraseña anterior.');
            return redirect()->back();
        }

        // Validar que las contraseñas tengan al menos 6 caracteres, una mayúscula y un símbolo
        if (strlen($nuevaContrasena) < 6 || !preg_match('/[A-Z]/', $nuevaContrasena) || !preg_match('/[!@#$%]/', $nuevaContrasena)) {
            session()->set('error', 'La nueva contraseña debe tener al menos 6 caracteres, una letra mayúscula y un símbolo (!@#$%).');
            return redirect()->back();
        }

        // Validar que las contraseñas coincidan
        if ($nuevaContrasena !== $confirmarContrasena) {
            session()->set('error', 'Las contraseñas no coinciden.');
            return redirect()->back();
        }

        // Hashear la nueva contraseña
        $hashedContraseña = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        // Actualizar la contraseña del usuario usando el método del modelo
        if ($usuarioModel->actualizarcontraseña($hashedContraseña, $idUsuario)) {
            // Eliminar el código de recuperación
            $codigoModel->eliminarCodigoPorUsuario($idUsuario);

            session()->set('exito', 'Contraseña actualizada correctamente.');
            return redirect()->to('autenticacion/login');
        } else {
            session()->set('error', 'Error al actualizar la contraseña.');
            return redirect()->back();
        }
    }
}
