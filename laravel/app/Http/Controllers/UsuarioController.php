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
use App\User;
use Hash;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsuarioController extends Controller{


	public function registrar(Request $request){
		$usuario = [
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password)
			];
		//$usuario->save();
		try {
	    	$user = User::create($usuario);				
		} catch (Exception $e) {
			return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
		}
		 
		return response()->json(['respuesta' => 'Se ha registrado']);
	}


}

?>