<?php

namespace App\Controllers;

use App\Models\ConfiguracionModel;
use App\Models\PlantaModel;

class CConfiguracion extends BaseController
{
    // Método para obtener la configuración más reciente de la planta
    public function configuracion($id_planta)
    {
        try {
            $configuracionModel = new ConfiguracionModel();

            $configuracion = $configuracionModel->obtenerUltimaConfiguracion($id_planta);

            if ($configuracion) {
                return $this->response->setJSON([
                    'nivel_minimo_humedad' => $configuracion['nivel_minimo_humedad'],
                    'nivel_maximo_humedad' => $configuracion['nivel_maximo_humedad']
                ]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'No se encontró configuración']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
        }
    }

    // Método para guardar la configuración de humedad
     // Método para mostrar la vista de configuración de humedad
     public function configuracionvista($id_planta)
     {
         // Cargar la planta
         $plantaModel = new PlantaModel();
         $planta = $plantaModel->obtenerPlantaPorId($id_planta);

         // Verificar si la planta existe
         if (!$planta) {
             return redirect()->to('/')->with('error', 'Planta no encontrada.');
         }
 
         // Cargar los datos de configuración de humedad si existen
         $configuracionModel = new ConfiguracionModel();
         $configuracion = $configuracionModel->obtenerUltimaConfiguracion($id_planta);

         // Pasar los datos a la vista
         return view('configuracion_usuario', [
             'planta' => $planta,
             'configuracion' => $configuracion
         ]);
     }
 
     // Método para guardar la configuración de humedad
     public function guardarConfiguracion()
     {
         // Obtener los datos del formulario
         $id_planta = $this->request->getPost('id_planta');
         $nivelMinimo = $this->request->getPost('nivel_minimo_humedad');
         $nivelMaximo = $this->request->getPost('nivel_maximo_humedad');
 
         // Validar datos
         if (!$id_planta || !$nivelMinimo || !$nivelMaximo) {
             return redirect()->back()->with('error', 'Datos incompletos');
         }
 
         // Crear el modelo de configuración
         $configuracionModel = new ConfiguracionModel();
         $array = 
         [
             'id_planta' => $id_planta,
             'nivel_minimo_humedad' => $nivelMinimo,
             'nivel_maximo_humedad' => $nivelMaximo
         ];
 
         // Guardar la configuración
         if ($configuracionModel->insertarDatos($array)) {
             return redirect()->to("/configuracion_usuario/{$id_planta}")->with('exito', 'Configuración guardada correctamente');
         } else {
             return redirect()->back()->with('error', 'Error al guardar configuración');
         }
     }
 }
