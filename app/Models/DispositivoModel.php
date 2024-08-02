<?php
namespace App\Models;

use CodeIgniter\Model;

class DispositivoModel extends Model
{
    public function obtenerDispositivos()
    {
        $query = $this->db->get('dispositivos');
        return $query->result();
    }
}
