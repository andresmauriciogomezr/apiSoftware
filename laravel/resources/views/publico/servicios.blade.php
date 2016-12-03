@extends('layouts.publico')

@section('contenido')
<head>
	<script type="text/javascript">
		function mostrar_panel_servicio(id_servicio){
		var visible = $("#visible_"+id_servicio).html();		
		if (visible == 'false') {
			$("#cuerpo_servicio_"+id_servicio).show();	
			$("#visible_"+id_servicio).html("true");
			$("#span_"+id_servicio).removeClass("glyphicon-menu-down")
			$("#span_"+id_servicio).addClass("glyphicon-menu-up")
		}else if (visible == 'true') {
			$("#cuerpo_servicio_"+id_servicio).hide();	
			$("#visible_"+id_servicio).html("false");
			$("#span_"+id_servicio).removeClass("glyphicon-menu-up")
			$("#span_"+id_servicio).addClass("glyphicon-menu-down")
		}
		

	}

	</script>
</head>
<body>
	<div class="container" id="ver_servicios">

		<div class="titulo_pagina row" id="titulo_ingresar_articulo">
			<blockquote class="page-header" style="padding-top:0px;">
				<h5 id="titulo_pagina">Servicios<small>Sobre los servicios que ofrecemos...</small></h5>
			</blockquote>
		</div>

		<div class="row panel-group " id="panel_servicios">
			@if(count($listaServicios) == 0)
				<h2>No existen Servicios para editar...</h2>
			@endif
			@foreach($listaServicios as $servicio)
				@if($rutaActivo == $servicio['servicio']->ruta)
					<div id="panel_servicio" class="panel panel-default " >
						<div class="btn btn-default col-xs-13 panel-head" onclick="mostrar_panel_servicio({{$servicio['servicio']->id}})">
							<p id="visible_{{$servicio['servicio']->id}}" class="tareas_servicio" hidden>true</p>				    	
							<h3 class="titulo_servicio">
								{{$servicio['servicio']->nombre}}
								<small><span id="span_{{$servicio['servicio']->id}}" class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
								</small>
							</h3>
						</div>
						<div id="cuerpo_servicio_{{$servicio['servicio']->id}}" class="panel-body">
							<div class="row">
								<div class="col-xs-8 ">
									<h3 titulo_area>
									</h3>
									<p class="descripcion_servicio text-justify">
									    {{$servicio['servicio']->descripcion}}
									</p>

								</div>

								<div class="col-xs-5 ">
									<h3 class="titulo_area">
										{{$servicio['area']->nombre}}<br>
										<small class="descripcion_area text-justify">
										{{$servicio['area']->descripcion}}
										</small>
									</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<ul id="tareas_servicio_{{$servicio['servicio']->id}}" class="tareas_servicio">
										@foreach($servicio['tareas'] as $tarea)										
											<li class="tareas">
												{{$tarea->nombre}}
											</li>
										@endforeach
									</ul>
								</div>
								</div>
								<div class="panel-footer">
								    <a  class="btn boton_eliminar_articulo enlace_modal" onclick="confirmacion_eliminar_servicio({{$servicio['servicio']->id}})">Contacto					
										<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
									</a>
								</div>
						</div>
					</div>
				@else
					<div id="panel_servicio" class="panel panel-default " >
						<div class="btn btn-default col-xs-13 panel-head" onclick="mostrar_panel_servicio({{$servicio['servicio']->id}})">
							<p id="visible_{{$servicio['servicio']->id}}" class="tareas_servicio" hidden>false</p>			    	
							<h3 class="titulo_servicio">
								{{$servicio['servicio']->nombre}}
								<small><span id="span_{{$servicio['servicio']->nombre}}" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></small>
								</small>
							</h3>
						</div>
						<div id="cuerpo_servicio_{{$servicio['servicio']->id}}" class="panel-body " hidden>
							<div class="row">
								<div class="col-xs-8 ">
									<h3 titulo_area>
									</h3>
									<p class="descripcion_servicio text-justify">
									    {{$servicio['servicio']->descripcion}}
									</p>

								</div>

								<div class="col-xs-5 ">
									<h3 class="titulo_area">
										{{$servicio['area']->nombre}}<br>
										<small class="descripcion_area text-justify">
										{{$servicio['area']->descripcion}}
										</small>
									</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<ul id="tareas_servicio_{{$servicio['servicio']->id}}" class="tareas_servicio">
										@foreach($servicio['tareas'] as $tarea)										
											<li class="tareas">
												{{$tarea->nombre}}
											</li>
										@endforeach
									</ul>
								</div>
								</div>
								<div class="panel-footer">
								    <a  class="btn boton_eliminar_articulo enlace_modal" onclick="confirmacion_eliminar_servicio({{$servicio['servicio']->id}})">Contacto					
										<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
									</a>
								</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>



<div id="ventana_confirmacion_servicio" class="modal fade">'<!--*********esta es la ventana de confirmación para eliminar articulos**************-->
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
          </button>          
        </div>

        <div class="modal-body " id="ventana_alerta">
          <div id="id_servicio" hidden=""></div>
          <blockquote>
            <p id="" class="alert alert-warning mensaje_alerta"></p>
          </blockquote>
          
        </div>

        <div class="modal_footer text-right">              
          <a class="btn enlace_modal" onclick="eliminar_servicio()" data-dismiss="modal"><h4>Si</h4></a>
          <a class="btn enlace_modal" data-dismiss="modal"><h4>No</h4></a>
        </div>

      </div>        
    </div>
</div>
</body>
@stop