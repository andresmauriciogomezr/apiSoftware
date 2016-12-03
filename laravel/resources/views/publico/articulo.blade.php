@extends('layouts.publico')
@section('contenido')
<head>
	<meta property="og:url"      content="{{$articulo->ruta}}" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="{{$articulo->titulo}}" />
	<meta property="og:description"        content="{{$articulo->titulo}}" />
	<meta property="og:image"              content="{{$articulo->ruta_imagen}}" />
	<script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player1', {
          height: '360',
          width: '640',
          videoId: 'OqvHHU-fFCE',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
	<script type="text/javascript">
		function meGusta(idArticulo){			
			$("#datos").attr('name', 'idArticulo');
			$("#datos").attr('value', idArticulo);
			var datos_token = $("#token");
			var datos_enviar = new FormData(datos_token[0]);
			$.ajax({
				type: "post",
				url: "{{ URL::asset('home/articulos/me-gusta') }}",
				contentType: false,
				processData: false,
				data : datos_enviar, 
				cache : false,
				mimeType : false,
				async : false,
				success: function(datos_recibidos){
					//console.log(datos_recibidos);
					//window.setTimeout('location.reload()', 500);	
				}		
			});
		}

		function noMeGusta(idArticulo){
			$("#datos").attr('name', 'idArticulo');
			$("#datos").attr('value', idArticulo);
			var datos_token = $("#token");
			var datos_enviar = new FormData(datos_token[0]);
			$.ajax({
				type: "post",
				url: "{{ URL::asset('home/articulos/no-me-gusta') }}",
				contentType: false,
				processData: false,
				data : datos_enviar, 
				cache : false,
				mimeType : false,
				async : false,
				success: function(datos_recibidos){
					//console.log(datos_recibidos);
					//window.setTimeout('location.reload()', 500);	
				}		
			});
		}

	</script>
</head>
<body>
<script>

	function share(){
		var ruta = $("#ruta").attr('content');
	    //console.log(ruta);
		 FB.ui({
        method : 'share',
        href : 'https://www.youtube.com/watch?v=CBTOGVb_cQg&list=RDMMzakKvbIQ28o&index=10',
	    }, function(response) {
	        if (response && !response.error_code) {
	            alert('Posting completed.');
	        } else {
	            alert('Error while posting.');
	        }
	    });



	}
	function compartir(){
		window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1150011068423173',
	      xfbml      : true,
	      version    : 'v2.8'
	    });	    

	    FB.getLoginStatus(function(response){
	    	if(response.status == 'connected'){
	    		console.log('conectados');
	    		share();
	    	}
	    	else{
	    		FB.login(function(response){
	    			if(response.status == 'connected'){
			    		console.log('conectados');
			    	}
			    	else{
			    		console.log('no se puede conectar');	
			    	}
	    		});
	    	}
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	    	
	}  

</script>
	<div class="container">
		<form id="token" ><!--Se usa para enviar información que contiene el token de seguridad-->
			{{csrf_field()}}	
			<input id="datos" name="prueba" value="soy la prueba" hidden>
		</form>
		<div class="titulo_pagina row" id="titulo_ingresar_articulo">
			<blockquote class="page-header" style="padding-top:0px;">
				<h5 id="titulo_pagina">Artículos de interés<small>{{$categoria->nombre}}</small></h5>
			</blockquote>
		</div>

		<div class="panel panel-default">

			<div class="panel-heading">
				<h1 class="titulo_articulo">{{$articulo->titulo}}</h1><small class="conteido-articulo">Por: <strong>{{$articulo->autor}}</strong> - Publicado: {{$articulo->fecha}}</small><br>

				<div class="row col-md-offset-9">
					<a  class="btn boton_eliminar_articulo enlace_modal" onclick="compartir()">
					<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
					compartir en Facebook
					</a>
						<a onclick="meGusta({{$articulo->id}})" class="btn btn-default">
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>					
						</a>				
						<a onclick="noMeGusta({{$articulo->id}})" class="btn btn-default">
							<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>					
						</a>	
				</div>

			</div>			

			<div class="panel-body">											
				@if($articulo->ruta_imagen != 'null')
					<div class="col-xs-8">
						<img src="{{$articulo->ruta_imagen}}" class="img-responsive img-thumbnail imagen-articulo" >	
					</div>
				@endif
				<div>

					<p class="conteido-articulo">{!!$articulo->contenido!!}</p>	
				</div>			
			</div>
				@if(count($archivos) > 0)
					@foreach($archivos as $archivo)
						<div class="panel-heading">
							<h2 class="titulo_articulo">Archivos anexos:</h2>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-5">
									<div class="jumbotron center-block">
										<p>{{$archivo->nombre}}</p>									 	
									 	<p><a class="btn btn-primary" href="{{$archivo->ruta}}" role="button">Descargar</a></p>
									</div>
								</div>
								<div class="col-xs-8">
									<iframe style="" src="http://docs.google.com/viewer?url={{$archivo->ruta}}&embedded=true" width="600" height="780"></iframe>
								</div>
							</div>
						</div>
					@endforeach
				@endif

			<div class="panel-footer">
				<a  class="btn boton_eliminar_articulo enlace_modal enlace" onclick="compartir()">
					<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
					compartir en Facebook					
				</a>
				<a onclick="meGusta({{$articulo->id}})" class="btn btn-default">
					<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>					
				</a>				
				<a onclick="noMeGusta({{$articulo->id}})" class="btn btn-default">
					<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>					
				</a>				
			</div>

		</div>

	</div>
</body>
@stop