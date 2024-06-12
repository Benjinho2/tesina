<?php

namespace App\Models;

use CodeIgniter\Model;

    class UsuarioModel extends Model
    {
        protected $table         = 'usuarios';
        protected $primaryKey    = 'id_usuario';
        protected $allowedFields = ['nombre_completo', 'email', 'contraseña'];

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
    }

?>