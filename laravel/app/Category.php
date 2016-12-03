<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

	public $timestamps = false;

	public function exiteCategoria($nombre){
        	$categoria = null;
                $categoria = Category::where('nombre', $nombre)->first();       
                if(is_null($categoria)){//no existe la categoria
                	return false;
                }else{
                        return true;
                }
	}

}
