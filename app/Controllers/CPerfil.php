<?php

namespace App\Controllers;

class CPerfil extends BaseController{

    function perfil()
    {
        
        $DatosUsuario = session()->get('userData');

        $array = [
            'userPerfil' => $DatosUsuario
        ];

        return view('perfil', $array);
    }

}