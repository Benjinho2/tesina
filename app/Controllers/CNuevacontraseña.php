<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\CodigoModel;

class CNuevacontraseña extends Controller
{
    public function index()
    {
        return view('autenticacion/nueva-contrasena');
    }

    public function actualizar()
    {
        $nuevaContraseña   = $this->request->getPost('nueva_contraseña');
        $repetirContrasena = $this->request->getPost('repetir_contrasena');
        $idUsuario         = $this->request->getPost('id_usuario');
        $codigoVerificacion = $this->request->getPost('codigo_verificacion'); // Asumiendo que pasas esto también

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->ObtenerUsuarioEmail($idUsuario);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Verificar que la nueva contraseña no sea igual a la antigua
        if (password_verify($nuevaContraseña, $usuario['contraseña'])) { // Usa 'contraseña'
            return redirect()->back()->with('error', 'La nueva contraseña no puede ser igual a la contraseña actual.');
        }

        // Validar que las contraseñas coincidan
        if ($nuevaContraseña !== $repetirContrasena) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden. Por favor, intenta de nuevo.');
        }

        // Validar que las contraseñas tengan al menos 6 caracteres, una mayúscula y un símbolo
        if (strlen($nuevaContraseña) < 6 || !preg_match('/[A-Z]/', $nuevaContraseña) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $nuevaContraseña)) {
            return redirect()->back()->with('error', 'La nueva contraseña debe tener al menos 6 caracteres, una letra mayúscula y un símbolo.');
        }

        $hashedContraseña = password_hash($nuevaContraseña, PASSWORD_DEFAULT);

        // Verificar el código de verificación y el id_usuario
        $codigoModel = new CodigoModel();
        $codigo = $codigoModel->verificarCodigoPorCodigo($codigoVerificacion);

        if ($codigo && $codigo['id_usuario'] == $idUsuario) {
            // Actualizar la contraseña del usuario
            $usuarioModel->Actualizarcontraseña($hashedContraseña, $idUsuario);

            // Opcional: Eliminar el código de verificación después de su uso
            $codigoModel->delete($codigo['id_codigo']);

            return redirect()->to('autenticacion/login')->with('mensaje', 'Contraseña actualizada correctamente');
        } else {
            return redirect()->back()->with('error', 'Código de verificación inválido o expirado.');
        }
    }
}
