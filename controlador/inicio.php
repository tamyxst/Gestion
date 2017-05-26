<?php

require_once('../modelo/DB.php');
require_once('../modelo/DB_contacto.php');
require_once('../modelo/DB_registro.php');
require_once('../modelo/DB_pedido.php');
require_once('../modelo/DB_incidencia.php');
require_once('Smarty.class.php');
include 'sidebar-mensajes.php';

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

//usuario conectado
    $smarty->assign("usuario", $usuario);
//sidebar-mensajes
    $smarty->assign("mensajes", $mensajes);
    $smarty->assign("numMensajes", $numMensajes);

//Sidebar Inicio
    $mostrarPedidos= DB_pedido::obtienePedidos();
    $numPedidos = count($mostrarPedidos);
    $smarty->assign("numPedidos", $numPedidos);
    
    $mostrarIncidencias= DB_incidencia::obtieneIncidencias();
    $numIncidencias = count($mostrarIncidencias);
    $smarty->assign("numIncidencias", $numIncidencias);
    $mostrarClientes = DB_contacto::obtieneClientes();
    $numClientes = count($mostrarClientes);
    $smarty->assign("numClientes", $numClientes);
    $mostrarProveedores = DB_contacto::obtieneProveedores();
    $numProveedores = count($mostrarProveedores);
    $smarty->assign("numProveedores", $numProveedores);

    $smarty->display("inicio.tpl");

