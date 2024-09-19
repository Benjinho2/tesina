<?php 

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use CodeIgniter\Controller;

class CConfiguracion extends Controller{

    public function configuracion()
    {
     // Verifica si el usuario ya está autenticado
        if (!session()->get('DatosUsuario')) {
            // Redirige al usuario autenticado a la página principal
            return redirect()->to('/');
        }

        return view ('configuracion');
    }

    public function guardar()
    {
        $configuracionModel = new ConfiguracionModel();
        
        $iddispositivo  = 1;
        $nombrePlanta   = $this->request->getPost('nombre_planta');
        $ubicacion      = $this->request->getPost('ubicacion');
        $nivelMinimo    = $this->request->getPost('nivel_minimo_humedad');
        $nivelMaximo    = $this->request->getPost('nivel_maximo_humedad');
    
        $array = [
            'id_dispositivo'       => $iddispositivo,
            'nombrePlanta'         => $nombrePlanta,
            'ubicacion'            => $ubicacion,
            'nivel_minimo_humedad' => $nivelMinimo,
            'nivel_maximo_humedad' => $nivelMaximo
        ];  
    
        if ($configuracionModel->guardarConfiguracion($array)) {
            
            session()->set('InfoPlanta', $array);
            
            session()->set('exito', 'Configuración agregada correctamente.');

            return redirect()->to('dispositivo');
        } else {
            echo "Error al agregar la configuración.";
        }
    }

}


      