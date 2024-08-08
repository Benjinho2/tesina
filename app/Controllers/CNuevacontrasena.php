<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\CodigoModel;

class CNuevacontrasena extends Controller
{
    public function index() {
        $token = $this->request->getGet('token');
        return view('autenticacion/nueva-contrasena', ['token' => $token]);
    }

    public function actualizar() {
        $usuarioModel = new UsuarioModel();
        $codigoModel = new CodigoModel();

        $token = $this->request->getPost('token');
        $nuevaContrasena = $this->request->getPost('nueva_contraseña');
        $repetirContrasena = $this->request->getPost('repetir_contrasena');

        // Verificar el token
        $codigoData = $codigoModel->obtenerUsuarioPorToken($token);

        if (!$codigoData) {
            return redirect()->back()->with('error', 'Token inválido o expirado.');
        }

        $idUsuario = $codigoData['id_usuario'];

        // Verificar que la nueva contraseña no sea igual a la antigua
        $usuario = $usuarioModel->find($idUsuario);
        if (password_verify($nuevaContrasena, $usuario['contraseña'])) {
            return redirect()->back()->with('error', 'La nueva contraseña no puede ser igual a la contraseña actual.');
        }

        // Validar que las contraseñas tengan al menos 6 caracteres, una mayúscula y un símbolo
        if (strlen($nuevaContrasena) < 6 || !preg_match('/[A-Z]/', $nuevaContrasena) || !preg_match('/[!@#$%]/', $nuevaContrasena)) {
            return redirect()->back()->with('error', 'La nueva contraseña debe tener al menos 6 caracteres, una letra mayúscula y un símbolo(!@#$%).');
        }

        // Validar que las contraseñas coincidan
        if ($nuevaContrasena !== $repetirContrasena) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
        }

        // Hashear la nueva contraseña
        $hashedContraseña = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        // Actualizar la contraseña del usuario usando el método del modelo
        if ($usuarioModel->actualizarcontraseña($hashedContraseña, $idUsuario)) {
            // Eliminar el token de recuperación
            $codigoData = $codigoModel->eliminarTokenPorUsuario($idUsuario);

            return redirect()->to('autenticacion/login')->with('exito', 'Contraseña actualizada correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar la contraseña.');
        }
    }
}
