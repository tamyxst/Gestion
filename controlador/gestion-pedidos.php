<?php
require_once('enviar-comentarios.php');
require_once('../modelo/DB.php');
require_once('../modelo/DB_contacto.php');
require_once('../modelo/DB_incidencia.php');
require_once('../modelo/DB_pedido.php');
require_once('../modelo/DB_registro.php');
require_once('Smarty.class.php');
require_once('xajax_core/xajax.inc.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) {
    //header("Location: error.php");
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}
// Cargamos la librería de Smarty
    $usuario = $_SESSION['usuario'];
    $smarty = new Smarty;

    $smarty->template_dir = '.././vista/templates/';
    $smarty->compile_dir = '.././vista/templates_c/';
    $smarty->config_dir = '.././vista/configs/';
    $smarty->cache_dir = '.././vista/cache/';

//Preparamos XAJAX
    $ajax = new xajax();
    $ajax->configure('debug',true);
    $ajax->register(XAJAX_FUNCTION, 'editar');
    $ajax->register(XAJAX_FUNCTION, 'cargarDetalle');    
    $ajax->register(XAJAX_FUNCTION, 'borrarImagen');
    
    $ajax->processRequest();

    $smarty->assign("codigoJS", $ajax->getJavascript());

//Cargamos todos los empleados en el select
    $usuarios = DB::obtieneUsuarios();
    $smarty->assign("usuarios", $usuarios);
    $smarty->assign("usuario",$usuario);
    
//Añadir contacto PENDIENTE
    if (isset($_POST['enviar'])) {
        $estado = filter_input(INPUT_POST, 'estado');
        $material = filter_input(INPUT_POST, 'material');
        $observaciones = filter_input(INPUT_POST, 'observaciones');
        
        //Por defecto
        $fecha = date('Y-m-d H:i:s'); //H mayúscula para formato 24 horas
        $fecha_entrega = filter_input(INPUT_POST, 'fecha_entrega');
        $fechaSql = date("Y-m-d H:i:s", strtotime($fecha_entrega));
        $tipo_reg="pedido"; 
        
        //Datos del autor de la pedido
        $contacto = filter_input(INPUT_POST, 'contacto'); //Recogemos los datos del autor
        $dni = explode('-', $contacto); //Separamos
        $id_contacto=DB_contacto::buscarContacto($dni[0]); //Buscamos la id_contacto por dni
        if($id_contacto===null){
            //Si no encuentra el contacto error
            header("Location: gestion-pedidos.php?state=no");
        }
        //Pedido asignada
        $id_usuario_r = filter_input(INPUT_POST, 'id_usuario_r');
        $valores[] = $fecha;
        $valores[] = $estado;
        $valores[] = $material;
        $valores[] = $observaciones;
        if($_FILES['imagen']['name'] == ""){
            $valores[] = null;
        }else{
            //Recojo imagen
            $origen = $_FILES['imagen']['tmp_name'];
            $nombreImagen = $_FILES['imagen']['name'];
            $tipo = $_FILES['imagen']['type'];
            $tipo_fichero = explode('/', $tipo);
            $dir_des = ".././dist/upload/imagen/" . $nombreImagen;
            $dir_destino= "/gestion/dist/upload/imagen/" . $nombreImagen;

            if ($tipo_fichero[0] == 'image') {
                if (move_uploaded_file($origen, $dir_des)) {
                    $mensaje = "Fichero movido";
                } else {
                    $mensaje = "Error";
                }
            }
            $valores[] = $dir_destino; //imagen    
        }
        $valores[] = (int) $id_contacto->getIdContacto(); //id_contacto del autor
        $valores[] = (int) $id_usuario_r;
        $valores[] = $tipo_reg; //Pedido
        $msjAdd = DB_pedido::anadirPedido($valores, $fechaSql);
        comprueba($msjAdd);
    }
//Se escriben los datos y se envian
    if (isset($_POST['editar'])) {
        $id_registro = filter_input(INPUT_POST, 'id_registro_e');
        $estado = filter_input(INPUT_POST, 'estado_e');
        $material = filter_input(INPUT_POST, 'material_e');
        $observaciones = filter_input(INPUT_POST, 'observaciones_e');
        $id_usuario_r = filter_input(INPUT_POST, 'id_usuario_r_e');
        $fecha_entrega = filter_input(INPUT_POST, 'fecha_entrega_e');
        $fechaSql = date("Y-m-d H:i:s", strtotime($fecha_entrega));
        //$nombre=DB::dameNombreUsuario($id_usuario_r);

        $valores[] = $estado;
        $valores[] = $material;
        $valores[] = $observaciones;
        if($_FILES['imagen_e']['name'] !== ""){
            //Recojo imagen
        $origen = $_FILES['imagen_e']['tmp_name'];
        $nombreImagen = $_FILES['imagen_e']['name'];
        $tipo = $_FILES['imagen_e']['type'];
        $tipo_fichero = explode('/', $tipo);
        $dir_des = ".././dist/upload/imagen/" . $nombreImagen;
        $dir_destino= "/gestion/dist/upload/imagen/" . $nombreImagen;
        if ($tipo_fichero[0] == 'image') {
            if (move_uploaded_file($origen, $dir_des)) {
                $mensaje = "Fichero movido";
            } else {
                $mensaje = "Error";
            }
        }
        
        $reg=DB_pedido::obtienePedido($id_registro);
        //Recojo las imagenes almacenadas
        $imagenes=$reg->getImagenReg();
        if($imagenes!==null){
            $imagenes.="+".$dir_destino;
            $valores[]=$imagenes;    
        }else{
            $imagenes=$dir_destino;
            $valores[]=$imagenes;  
        }
        }
        $valores[] = $id_usuario_r;
        $valores[] = $id_registro;
        
        if($_FILES['imagen_e']['name']!==''){
            $msjAdd = DB_pedido::editarPedidoCI($valores, $fechaSql, $id_registro);
        }else{
            $msjAdd = DB_pedido::editarPedidoSI($valores, $fechaSql, $id_registro);
        }
        comprueba($msjAdd);
    }

    if (isset($_POST['eliminar'])) {
        $id_registro = filter_input(INPUT_POST, 'id_registro_e');
        $msjAdd = DB_pedido::eliminarPedido($id_registro);
        comprueba($msjAdd);
    }

//Ver detalle pedido
    if (isset($_GET['id'])) {
        $id_registro = $_GET['id'];
        $pedido = DB_pedido::obtienePedido($id_registro);
        //Recogemos todos los datos para filtrar luego si es proveedor o si es cliente
        $cont = DB_contacto::obtieneContacto($pedido->getIdContactoRegId());
        $smarty->assign("cont", $cont);
        $smarty->assign("pedido", $pedido);
        
    }

    function comprueba($msjTxt) {
        if ($msjTxt != null) {
            header("Location: gestion-pedidos.php?state=si");
        } else {
            header("Location: gestion-pedidos.php?state=no");
        }
    }

//Asignamos a Smarty
    if (isset($_GET['state'])) {
        $state = $_GET['state'];
        if ($state != 'no') {
            $smarty->assign("msj", "no");
        } else {
            $smarty->assign("msj", "si");
        }
    }



    function cargarDetalle($id_contacto) {
        $respuesta = new xajaxResponse();
        $r = DB_pedido::obtienePedido($id_contacto);
        asignarIdRegistro($r);
        return $respuesta;
    }
    function borrarImagen($imagen,$id_registro){
        $respuesta = new xajaxResponse();
        $pedido = DB_pedido::obtienePedido($id_registro);
        $cadena = creaCadena($pedido,$imagen);
        DB_registro::editarRegistroImagen($cadena,$id_registro);
        $pedidoN = DB_pedido::obtienePedido($id_registro);
        if($pedidoN->getImagenReg()===null){
            $respuesta->assign('img-registro','innerHTML','No hay imágenes');
        }else{
        $respuesta->assign('img-registro','innerHTML','');
        $respuesta->append('img-registro', 'innerHTML', "<input type='hidden' name='imagen_e' value='$cadena'>");
        
        foreach($pedidoN->getImagenRegArreglo() as $i){
            $respuesta->append('img-registro', 'innerHTML',"<div class='col-lg-4'>Imagen pedido: <a href='$i' alt='$pedidoN->getIdContactoReg()' target='_blank'>"
                    . "<img class='img-responsive' src='$i'></a>"
                    . '<button type="button" name="borrar" class="btn btn-default btn-del" onclick="borrarImagen(\''.$i.'\',\''.$pedido->getIdReg().'\')" />Borrar Imagen</button> </div>');
            }
        }
        return $respuesta;
    }
    
    function creaCadena($pedido,$imagen){
       foreach ($pedido->getImagenRegArreglo() as $i){
            if($imagen!==$i){
                if($cadena===null){
                    $cadena.=$i;
                }else{
                    $cadena.="+".$i;
                }
            }
        }
        return $cadena;
    }
//Cargamos el usuario conectado
    $smarty->assign("usuario", $usuario);

//Cargamos el sidebar-mensajes
    include 'sidebar-mensajes.php';
    $smarty->assign("mensajes", $mensajes);
    $smarty->assign("numMensajes", $numMensajes);

//Obtener todos los pedido
    $mostrarPedidos = DB_pedido::obtienePedidos();
    $smarty->assign("mostrarPedidos", $mostrarPedidos);

//Comentarios
    $smarty->assign("comentarios", $comentarios);
    
//Sidebar inicio
    $mostrarReg= DB_registro::obtieneRegistros();
    $numReg = count($mostrarReg);
    $smarty->assign("numReg", $numReg);
    
    $numPedidos = count($mostrarPedidos);
    $smarty->assign("numPedidos", $numPedidos); 
    
    
    $mostrarIncidencias= DB_incidencia::obtieneIncidencias();
    $numIncidencias = count($mostrarIncidencias);
    $smarty->assign("numIncidencias", $numIncidencias); //Incidencias
    
    $mostrarClientes = DB_contacto::obtieneClientes();
    $numClientes = count($mostrarClientes);
    $smarty->assign("numClientes", $numClientes);
    
    $mostrarProveedores = DB_contacto::obtieneProveedores();
    $numProveedores = count($mostrarProveedores);
    $smarty->assign("numProveedores", $numProveedores);

    $smarty->display("gestion-pedidos.tpl");

