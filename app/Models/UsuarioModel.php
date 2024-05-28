<?php

namespace App\Models;

use CodeIgniter\Model;

    class UsuarioModel extends Model
    {
        protected $table = 'usuarios';
        protected $primaryKey = 'id_usuario';
        protected $allowedFields = ['nombre_completo', 'email', 'contraseña'];


        // Método para insertar los datos del usuario
        public function insertarUsuario($array)
        {
            return $this->insert($array);
        }
        
        public function exitenteEmail($email)
        {
        return $this->where('email', $email)->countAllResults() > 0;
        }       

        // Método para obtener el usuario por email
        public function ObtenerUsuarioEmail($email)
        {
            return $this->where('email', $email)->first();
        }
    }

?>