<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Archivos;
use App\Area;
use App\Service;
use App\Task;
use App\File;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class HomeController extends Controller{

    public function prueba(Request $request){
        return json_encode(['datos' => 'value']);
    }

    public function autenticar(Request $request){
        $credenciales = $request->only('email' , 'password');
        $token = null;

        try {

            if(!$token = JWTAuth::attempt($credenciales)){//no se asignaron las credenciales
                return response()->json([
                'error' => 'Cedenciales inválidas'
                ], 500);

            }
            
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Algo pasó :('
                ], 500);
        }
        $user = JWTAuth::toUser($token);
        return response()->json([compact('token', 'user')]);
        //return json_encode(['token' => $token, 'user' => $user]);
    }
    
}
