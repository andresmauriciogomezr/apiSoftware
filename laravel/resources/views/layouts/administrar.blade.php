<!DOCTYPE html>
<html id="documento">		
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="vieport" content="width=device-width", initial-scale=1>
	<title>Administrar</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('/css/estilos.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('laravel\storage\app\public\logo.png') }}" />
</head>

<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>


<body class="">

<!--************************************cabecera************************-->
<div id="contenido_cabecera" class="cabecera">

<div class="" id="div_cabecera">

      <div class="container panel no_fondo" id="panel_lema_logo">
        
        <div class="row margen" >

          <div class="col-xs-13 col-md-4 " id="fila_logo">
            <a id="opcion_administrar" href="{{ URL::asset('/home') }}" class="btn">
              <img src="{{ URL::asset('/imagenes/logo.png') }}" class="img-responsive img-rounded sombra_logo">
            </a>

          </div>

          <div class="col-md-7 col-md-offset-1 visible-md-block visible-lg-block ">             
            <div class="">
              <h1 id="lema" class="">Consultoría Empresarial <small> Contable y Financiera </small></h1>   
            </div>

          </div>          

      </div><!--row-->

        



        <div class="row margen menu_cabecera">
          
          <!--<nav class="row navbar navbar-default navbar-fixed-menu_cabecera bordes_redondeados" id="barra_cabecera" data-toggle="collapse" >-->
          <nav class="row navbar navbar-default navbar-fixed-menu_cabecera bordes_redondeados" id="barra_cabecera">
            
            <div  class="container-fluid" >
            
              <div class="navbar-header">
                <div class="">
                  <p  principalid="titulo_menu_administrar navbar-right" class="btn opcion_cabecera collapsed visible-xs-block visible-sm-block" data-toggle="collapse" data-target="#opciones_barra_cabecera" aria-expanded="false">GoodFirm Menú</p>              
                </div>
              </div>

              <div class="collapse navbar-collapse container" id="opciones_barra_cabecera">

                <ul class="nav nav-tabs navbar-nav row">

                  
                  <li>
                      <a href="{{ URL::asset('home') }}"><p class="opcion_cabecera">Home</p></a>
                      <!--<a href="home" data-target="home" target="_blank"><p class="opcion_cabecera">Home</p></a>-->
                  </li>
                 
                  <li class="">
                   
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >
                        <p class="opcion_cabecera">Interés<span class="caret"></span></p>
                      </a>             
                      
                     <ul id="interes_cabecera" class="dropdown-menu">

                          <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              Artículos
                            </a>
                            
                            <ul class="dropdown-menu multi-level">
                                    @foreach ($categorias as $categoria)
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                                          {{$categoria['nombre']}}
                                        </a>                                       
                                        <ul id="lista_links_articulos" class="dropdown-menu multi-level">
                                          @foreach ($categoria['articulos'] as $articulo)
                                            <li>                                         
                                              <a href="{{$articulo['ruta']}}" class="" >
                                                  {{$articulo['titulo']}}
                                              </a>
                                            </li>                                       
                                          @endforeach        
                                        </ul>

                                      </li>
                                    @endforeach
                            </ul>

                           </li>

                      </ul>

                  </li>

                   <li>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <p class="opcion_cabecera">Servicios<span class="caret"></span></p>
                      </a>  
                            <ul class="dropdown-menu">
                                    @foreach ($areas as $area)
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                                          {{$area['nombre']}}
                                        </a>                                       
                                        <ul id="lista_links_articulos" class="dropdown-menu multi-level">
                                          @foreach ($area['servicios'] as $servicio)
                                            <li>                                         
                                              <a href="{{$servicio['ruta']}}" class="" >
                                                  {{$servicio['nombre']}}
                                              </a>
                                            </li>                                       
                                          @endforeach        
                                        </ul>

                                      </li>
                                    @endforeach
                            </ul>
                    </li> 


                  <li role="presentation" class="">
                      <a href="{{ URL::asset('administrar') }}"  class=""><p class="opcion_cabecera">Administrar</p></a>
                  </li>                 

                </ul>

              </div>

            </div>
          </nav>

        </div>
    </div><!--div container-->



    <!--************************************menú administrar**************************************-->

    <div class="container menu_administrar" id="div_menu_administrar">

      <nav class="row navbar navbar-default navbar-fixed-menu_administrar borde_barra_administrar"><!--************************************menú administrar************************-->

        <div id="barra_administrar" class="container-fluid" >
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  aria-expanded="false">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>           
          </div>
        

          <div class=" navbar-collapse" id="opciones_barra_administrar">

            <ul class="nav nav-pills navbar-nav pull-right" id="opciones_administrar">
              <li>
                <a href="{{ URL::asset('editar_articulos/1') }}" id="titulo_menu_administrar navbar-right" class="navbar-brand opcion_administrar col-md-1" >Admin</a>
              </li>
              <li role="presentation" class="dropdown opcion_administrar" id="link_articulos">
                <a class="dropdown-toggle" role="button" id="drop_administrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artículos
                <span class="caret"></span>
                </a>

                <ul class="dropdown-menu " aria-labelledby="dropdownMenu1">
                  
                  <li id="link_agregar_articulo" class="opcion_administrar" role="presentacion">
                    <a href="{{ URL::asset('anadir_articulo') }}">Agrege un atriculo</a>                    
                  </li>

                  <li id="link_ver_articulos" class="opcion_administrar" role="presentacion ">
                    <a href="{{ URL::asset('editar_articulos/1') }}">Edíte sus articulos</a>                    
                  </li>
                  <li id="link_categorias" class="opcion_administrar" role="presentacion ">
                    <a href="{{ URL::asset('editar_categorias') }}">Edíte sus categorías</a>                    
                  </li>             
                </ul>
              </li>

              <li role="presentation" class="dropdown opcion_administrar" id="link_servicios">
                <a class="dropdown-toggle" role="button" id="drop_administrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios
                <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li id="link_agregar_servcio" class="opcion_administrar" role="presentacion">
                    <a href="{{ URL::asset('anadir_servicio') }}">Agrege un servicio</a> 
                  </li>                             
                  <li id="link_editar_servicios" class="opcion_administrar" role="presentacion">
                    <a href="{{ URL::asset('editar_servicios') }}">Edíte sus servicios</a> 
                  </li>                             
                  <li id="link_editar_servicios" class="opcion_administrar" role="presentacion">
                    <a href="{{ URL::asset('editar_areas') }}">Edíte sus áreas</a> 
                  </li>                             
                </ul>
              </li>
                            
            </ul>     
          </div>
        </div>
      </nav>  
    </div><!--************************************menú administrar**************************************-->
  </div>


</div><!--************************************ find de cabecera************************-->

@yield('contenido')


<div class="">
	
	<div id="contenido_administrar" class="">
	 <!--acá se carga el contenido para dministrar-->
	</div>

</div>

  <div id="ventana_confirmacion" class="modal fade">'<!--*********esta es la ventana de confirmación para eliminar articulos**************-->
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
          </button>          
        </div>

        <div class="modal-body " id="ventana_alerta">
          <div id="id_articulo" hidden=""></div>
          <blockquote>
            <p id="mensaje_alerta" class="alert alert-warning"></p>
          </blockquote>
          
        </div>

        <div class="modal_footer text-right">              
          <a class="btn enlace_modal" onclick="eliminar_articulo()" data-dismiss="modal"><h4>Si</h4></a>
          <a class="btn enlace_modal" data-dismiss="modal"><h4>No</h4></a>
        </div>

      </div>        
    </div>
  </div>


 
  <div id="footer" class="">

      <div class="container">
      <div class="row">
        <h1></h1>     
        
        <div class="col-xs-5">
          <address id="" class="datos_contacto">

            <a href="../home/home.html" class="datos_contacto">
              <strong id="titulo_contacto">GoodFirm</strong>
            </a><br>
              Dirección por definir<br>
              Ciudad Por definir<br>
              <abbr title="Telefono">Tel:</abbr> Por definir
          </address>

          <address class="datos_contacto">
            <strong>Correo electronico</strong><br>
            <a href="mailto:#">por_definir@ejemplo.com</a>
          </address>
        </div>


        <div class="col-xs-8 ">
          <div id="lista_links_area" class="row">           
             
              @foreach ($areas as $area)
              <span class="glyphicon glyphicon-folder-open glyphicon-sm" aria-hidden="true"></span>
              <strong id="{{$area['id']}}'" class="titulo_area_footer">
                  {{$area['nombre']}}
              </strong>              
              <ul id="item" class="list-inline">
                @foreach ($area['servicios'] as $servicio)
                  <li>
                    <a href="{{$servicio['ruta']}}" class="btn " >
                      * {{$servicio['nombre']}}</a>
                  </li>                
                @endforeach              
                </ul> 
              @endforeach


          </div>
          
        </div>

      </div>
    </div>

  </div>

</body>

</html>