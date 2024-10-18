<?php 
namespace App\Models;

use CodeIgniter\Model;

class HistorialModel extends Model{
    protected $table         = 'registro_riegos';
    protected $primaryKey    = 'id_registro';
    protected $allowedFields = ['id_lectura', 'fecha_hora', 'duracion_riego'];

    // Función para obtener riegos por id de planta
    public function getRiegosByPlanta($id_planta)
    {
        return $this->select('rr.fecha_hora, rr.duracion_riego, lh.id_dispositivo')
                    ->from('registro_riegos rr')
                    ->join('lecturas_humedad lh', 'rr.id_lectura = lh.id_lectura')
                    // Aquí no es necesario filtrar por id_dispositivo
                    ->findAll();
    }

}