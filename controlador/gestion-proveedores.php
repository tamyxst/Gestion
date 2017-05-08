<?php
require_once('../modelo/DB.php');
require_once('../modelo/DB_contacto.php');
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
$ajax->register(XAJAX_FUNCTION, 'editar');
$ajax->register(XAJAX_FUNCTION, 'cargarDetalle');
$ajax->processRequest();

$smarty->assign("codigoJS", $ajax->getJavascript());

//Cargamos el usuario conectado
$smarty->assign("usuario",$usuario);

//Cargamos el sidebar-mensajes
include 'sidebar-mensajes.php';
$smarty->assign("mensajes",$mensajes);
$smarty->assign("numMensajes", $numMensajes);

//Cargamos proveedores
$mostrarProveedores = DB_contacto::obtieneProveedores();
$smarty->assign("mostrarProveedores",$mostrarProveedores);

//Añadir contacto PENDIENTE
if(isset($_POST['enviar'])){
    $dni=filter_input(INPUT_POST, 'dni');
    $nombre=filter_input(INPUT_POST, 'nombre');
    $direccion=filter_input(INPUT_POST, 'direccion');
    $ciudad=filter_input(INPUT_POST, 'ciudad');     
    $cod_postal=filter_input(INPUT_POST, 'cod_postal');  
    $email=filter_input(INPUT_POST, 'email'); 
    $tipo='proveedor'; 
    
    $sector=filter_input(INPUT_POST,'sector');
    $contacto=filter_input(INPUT_POST,'contacto');
    $telefono=filter_input(INPUT_POST, 'telefono'); 
    
    $valores[]=$dni;
    $valores[]=$nombre;
    $valores[]=$direccion;
    $valores[]=$ciudad;
    $valores[]=$cod_postal;
    $valores[]=$email;
    $valores[]=$tipo;
    
    $existe=DB_contacto::buscarContacto($dni);
    if(!$existe){
        //Si no existe ningun cliente lo añadimos
        $msjAdd= DB_contacto::anadirProveedor($valores,$telefono,$sector,$contacto);
        //Lanzamos mensaje si se ha realizado el registro.
        comprueba($msjAdd);
    }else{
        //Sino se mostrará mensaje error
        $smarty->assign("msj","existe"); 
    }
}

if(isset($_POST['editar'])){
    $id_contacto=filter_input(INPUT_POST, 'id_contacto');
    $dni=filter_input(INPUT_POST, 'dni');
    $nombre=filter_input(INPUT_POST, 'nombre');
    $direccion=filter_input(INPUT_POST, 'direccion');
    $ciudad=filter_input(INPUT_POST, 'ciudad');     
    $cod_postal=filter_input(INPUT_POST, 'cod_postal');  
    $email=filter_input(INPUT_POST, 'email'); 
    $telefono=filter_input(INPUT_POST, 'telefono'); 
    $sector=filter_input(INPUT_POST,'sector');
    $contacto=filter_input(INPUT_POST,'contacto');
    
    $valores[]=$dni;
    $valores[]=$nombre;
    $valores[]=$direccion;
    $valores[]=$ciudad;
    $valores[]=$cod_postal;
    $valores[]=$email;
    $valores[]=$id_contacto;
    
    $msjAdd= DB_contacto::editarProveedor($valores,$telefono,$id_contacto,$sector,$contacto);
    comprueba($msjAdd);
    
}

if(isset($_POST['eliminar'])){
    $id_contacto=filter_input(INPUT_POST, 'id_contacto');
    $msjAdd= DB_contacto::eliminarProveedor($id_contacto);
    comprueba($msjAdd);
}

//Ver detalle clientes
if(isset($_GET['id'])){
    $id_contacto=$_GET['id'];
    $proveedor= DB_contacto::obtieneProveedor($id_contacto);
    asignarIdContacto($proveedor);
}

function comprueba($msjTxt){
    if($msjTxt!=null){
        header("Location: gestion-proveedores.php?state=si");
    }else{
        header("Location: gestion-proveedores.php?state=no");
    }
}

//Asignamos a Smarty
if(isset($_GET['state'])){
    $state=$_GET['state'];
    if($state!='no'){
        $smarty->assign("msj","no");
    }else{
        $smarty->assign("msj","si");
    }
}

//FUNCIONES XAJAX
function editar($id_contacto){
    $respuesta = new xajaxResponse();
    //Cargamos contacto
    $c=DB_contacto::obtieneProveedor($id_contacto);
    $respuesta->assign('id_contacto_e', 'value', $c->getIdContacto());
    $respuesta->assign('dni_e', 'value', $c->getDniContacto());
    $respuesta->assign('nombre_e', 'value', $c->getNombreContacto());
    $respuesta->assign('direccion_e', 'value', $c->getDireccionContacto());
    $respuesta->assign('ciudad_e', 'value', $c->getCiudadContacto());
    $respuesta->assign('cod_postal_e', 'value', $c->getCodPostalContacto());
    $respuesta->assign('email_e', 'value', $c->getEmailContacto());
    $respuesta->assign('telefono_e', 'value', $c->getTelefonoContacto());
    $respuesta->assign('sector_e', 'value', $c->getSector());
    $respuesta->assign('contacto_e', 'value', $c->getPersonaContacto());
    return $respuesta;
}

/*function cargarDetalle($id_contacto){
    $respuesta = new xajaxResponse();
    $c=DB::obtieneCliente($id_contacto);
    asignarIdContacto($c);
    return $respuesta;
}*/

function asignarIdContacto($proveedor){
    global $smarty;
    $smarty->assign("proveedor",$proveedor);
}

//Sidebar inicio
$mostrarClientes = DB_contacto::obtieneClientes();
$numClientes=count($mostrarClientes);
$smarty->assign("numClientes",$numClientes);
$numProveedores=count($mostrarProveedores);
$smarty->assign("numProveedores",$numProveedores);

$smarty->display("gestion-proveedores.tpl");
?>