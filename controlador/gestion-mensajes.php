<?php
require_once('../modelo/DB.php');
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
$usuario=$_SESSION['usuario'];
$smarty = new Smarty;

$smarty->template_dir = '.././vista/templates/';
$smarty->compile_dir = '.././vista/templates_c/';
$smarty->config_dir = '.././vista/configs/';
$smarty->cache_dir = '.././vista/cache/';

//Preparamos XAJAX
$ajax = new xajax();
//$ajax->configure('debug',true);
//Funcion cargar mensaje
$ajax->register(XAJAX_FUNCTION, 'cargar');
$ajax->register(XAJAX_FUNCTION, 'archivar');
$ajax->register(XAJAX_FUNCTION, 'eliminar');
$ajax->register(XAJAX_FUNCTION, 'responder');
$ajax->processRequest();
$smarty->assign("codigoJS", $ajax->getJavascript());

//Opción eliminar varios mensajes
if(isset($_POST['eliminarv'])){
    $mEliminar=$_POST['checkmsj'];
    foreach($mEliminar as $e){
        $msjEliminaV=DB::eliminarMensaje($e);
    }
    comprueba($msjEliminaV);
}

if(isset($_POST['enviar'])){
    $cuerpo=filter_input(INPUT_POST, 'cuerpo_mensaje');
    $destinatario=filter_input(INPUT_POST, 'user');
    $msjAdd=DB::enviarMensaje($cuerpo,$destinatario);
    comprueba($msjAdd);
}

//Cargamos el usuario conectado
$smarty->assign("usuario",$usuario);

//Cargamos el sidebar-mensajes
include 'sidebar-mensajes.php';
$smarty->assign("mensajes",$mensajes);
$smarty->assign("numMensajes", $numMensajes);

//Obtener todos los mensajes
$mostrarMensajes = DB::obtieneMensajes();
$smarty->assign("mostrarMensajes",$mostrarMensajes);

//Cargamos todos los empleados en el select
$usuarios = DB::obtieneUsuarios();
$smarty->assign("usuarios",$usuarios);

//Ver detalle mensaje
if(isset($_GET['id'])){
    $id_mensaje=$_GET['id'];
    $mensaje=DB::obtieneMensaje($id_mensaje);
    $smarty->assign("mensaje",$mensaje);
}

function comprueba($msjTxt){
    global $smarty;
    if($msjTxt!=null){
        $smarty->assign("msj","no");
    }else{
        $smarty->assign("msj","si");
    }
}

//Se muestra mensaje de error o éxito (XAJAX)
if(isset($_GET['error'])){
    $error=$_GET['error'];
    $smarty->assign("msj",$error);
}
//FUNCIONES XAJAX
/**
 * Función por xajax que permite que al hacer clic sobre el mensaje se muestre
 * completo debajo sin recargar la página.
 * @param type $id_mensaje
 * @return \xajaxResponse
 */
function cargar($id_mensaje){
    $respuesta = new xajaxResponse();
    $mensaje=DB::obtieneMensaje($id_mensaje);
    $respuesta->assign('emisor', 'innerHTML', "De: " .$mensaje[0]->getNombreEmisor());
    $respuesta->assign('fecha', 'innerHTML', $mensaje[0]->getFecha());
    $respuesta->assign('cuerpo', 'innerHTML', $mensaje[0]->getMensaje());
    $respuesta->assign('responder','innerHTML','<button type="button" '
            . 'onclick="responder(\''.$mensaje[0]->getIdMensaje().'\')" name="responder" class="btn btn-default">'
            . '<i class="fa fa-reply"></i> Responder</button>');
    $respuesta->assign('archivar','innerHTML','<button type="button" '
            . 'onclick="archivar(\''.$mensaje[0]->getIdMensaje().'\')" name="archivar" class="btn btn-default">'
            . '<i class="fa fa-share"></i> Marcar Leído</button>');
    $respuesta->assign('eliminar','innerHTML','<button type="button" '
            . 'onclick="eliminar(\''.$mensaje[0]->getIdMensaje().'\')" name="eliminar" class="btn btn-default">'
            . '<i class="fa fa-trash-o"></i> Eliminar</button>');
    $respuesta->assign('msj','innerHTML','');
    return $respuesta;
}
/**
 * Función que se encarga de archivar el mensaje y recargar la página.
 * @param type $id_mensaje
 * @return \xajaxResponse
 */
function archivar($id_mensaje){
    $respuesta = new xajaxResponse();
    $msjArchiva=DB::archivarMensaje($id_mensaje);
    if($msjArchiva==null){
        //Algo ha salido mal
        $respuesta->redirect('gestion-mensajes.php?error=si');
    }else{
        $respuesta->redirect('gestion-mensajes.php?error=no');
    }
    return $respuesta;
}

/*function eliminar($id_mensaje){
    $respuesta = new xajaxResponse();
    $msjElimina=DB::eliminarMensaje($id_mensaje);
    if($msjElimina!=null){
        $mensajes = DB::obtieneMensajes();
        $cadena=dameContenido($mensajes);
        $respuesta->assign("aqui",'innerHTML',"");
        $respuesta->append("aqui",'innerHTML','<table id="mensajes" class="display table table-bordered table-hover">');
        $respuesta->append("aqui",'innerHTML','<thead><tr><th></th><th>Nombre</th><th>Cuerpo mensaje</th><th>Fecha</th></tr></thead><tbody>');
        foreach ($cadena as $c) {
            $respuesta->append('aqui', 'innerHTML', $c);
        }
        $respuesta->append("aqui",'innerHTML','</tbody></table>');
    }
    return $respuesta;
}*/

function eliminar($id_mensaje){
    $respuesta = new xajaxResponse();
    $msjElimina=DB::eliminarMensaje($id_mensaje);
    if($msjElimina!=null){
        $respuesta->redirect('gestion-mensajes.php?error=no');
    }else{
        $respuesta->redirect('gestion-mensajes.php?error=si');
    }
    return $respuesta;
}

function dameContenido($mensajes){
    $cadenas =[];
    foreach ($mensajes as $m){
    $cadena .= '<tr><td class="mailbox-star"><input type="checkbox"></td>';
       if($m->getArchivar()==0){
           $cadena .= '<td class="mailbox-name">'
                   . '<a name="cargar" onclick="cargar(\''.$m->getIdMensaje().'\')" />'
                   . '<b>'.$m->getNombreEmisor().'</b></a></td><td class="mailbox-subject">'
                   . '<b>'.$m->getMensajeCorto().'</b></td>';
       }else{
           $cadena .='<td class="mailbox-name">'
                   . '<a name="cargar" onclick="cargar(\''.$m->getIdMensaje().'\')" />'
                   . '<b>'.$m->getNombreEmisor().'</a></td><td class="mailbox-subject">'
                   . '<b>'.$m->getMensajeCorto().'</td>';
       }
       $cadena .= '<td class="mailbox-date">'.$m->getFecha().'</td></tr>';
       $cadenas[]=$cadena;
    }
    return $cadenas;
}
function responder($id_usuario_m){
    $respuesta = new xajaxResponse();
    $respuesta->assign('destino','innerHTML','');
    $respuesta->append('destino','innerHTML','<label>Para:</label>'
            . '<select class="form-control" name="user">');
    $users= DB::obtieneUsuarios();
    foreach ($users as $us){
        if($us->getIdUsuario()==$id_usuario_m){
            $respuesta->append('destino','innerHTML','<option selected value="\''.$us->getIdUsuario().'\'">' . $us->getNombreCompleto(). '</option>');
        }else{
            $respuesta->append('destino','innerHTML','<option value="\''.$us->getIdUsuario().'\'">' . $us->getNombreCompleto(). '</option>');
        }
    }
    $respuesta->append('destino','innerHTML','<select class="form-control" name="usuarios">');
    return $respuesta;
}
$smarty->display("gestion-mensajes.tpl");

   
?>