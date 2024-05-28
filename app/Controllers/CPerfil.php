<?php

namespace App\Controllers;

class CPerfil extends BaseController{

    function perfil()
    {
        
        $userData = session()->get('userData');

        $data = [
            'userPerfil' => $userData
        ];

        return view('perfil', $data);

    }

}