<?php 
namespace App\Models;
use CodeIgniter\Model;

class LecturaModel extends Model
{
    protected $table = 'lecturas_humedad';
    protected $primaryKey = 'id_lectura';
    protected $allowedFields = ['id_dispositivo', 'fecha_hora', 'nivel_humedad'];

    public function obtenerLecturasPorPlanta($id_planta)
    {
        return $this->db->table('lecturas_humedad lh')
            ->select('lh.id_lectura, lh.id_dispositivo, lh.fecha_hora, lh.nivel_humedad')
            ->join('configuracion_riego cr', 'lh.id_dispositivo = cr.id_dispositivo')
            ->where('cr.id_planta', $id_planta)
            ->orderBy('lh.fecha_hora', 'DESC')
            ->get()
            ->getResultArray();
    }
}
