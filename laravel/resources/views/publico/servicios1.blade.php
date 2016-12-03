@extends('layouts.publico')

@section('contenido')
<script type="text/javascript">
	function nuevo_articulo(){		
		var datos_articulo = $("#nuevo_articulo");
		var datos_enviar = new FormData(datos_articulo[0]);
		//console.log(datos_articulo);
		$.ajax({
			url :"{{ URL::asset('servicios1') }}", 
			type : "post",
			contentType: false,
			processData: false,
			data : datos_enviar, 
			cache : false,
			mimeType : false,
			async : false,
			success: function(datos_recibidos){				
				//console.log("dats: " +datos_recibidos);				
			}		

		});	
		//console.log("pasó");
	}
</script>
	<div class="container">
		<form  id="nuevo_articulo" action="#" onsubmit="enviar_formulario()" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="file" class="" name="archivo" id="imagen_articulo">
			
			<input type="text" name="texto">
				<input type="submit" name="">

		</form>
		<iframe style="" src="http://docs.google.com/viewer?url=goodfirmcolombia.co/laravel/storage/app/archivos/prueba.xlsx&embedded=true" width="600" height="780"></iframe>

		


		<iframe id="iframe_10" style="box-sizing: border-box; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border-width: 0px; border-style: initial; outline: 0px; font-size: 1em; text-size-adjust: 100%; vertical-align: baseline; background: transparent; width: 580px; height: 314px;" src="https://www.youtube.com/embed/OqvHHU-fFCE?rel=0" name="	iframe_10" width="560" height="315" frameborder="0" scrolling="no"></iframe>



	</div>
@stop