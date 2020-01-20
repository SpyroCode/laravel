<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function pruebas(Request $request){
        return "Accion de pruebas USER-CONTROLLER";
    }

    public function register(Request $request){
        return "Accion de Registro de Usuarios";
    }

    public function login(Request $request){
        return "Accion de Login de Usuarios";
    }
}
