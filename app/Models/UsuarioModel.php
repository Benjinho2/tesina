<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table         = 'usuarios';
    protected $primaryKey    = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'contraseña'];

    public function insertarUsuario($array)
    {
        return $this->insert($array);
    }
    
    public function existenteEmail($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    public function ObtenerUsuarioEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function Actualizarcontraseña($hashedContraseña, $idUsuario)
    {
        return $this->set('contraseña', $hashedContraseña) // Usa 'contraseña'
                     ->where('id_usuario', $idUsuario)
                     ->update();
    }
}
