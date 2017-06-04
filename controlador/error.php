<?php
require_once('Smarty.class.php');
session_start();

// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) {
    //header("Location: error.php");
    die("Error - debe <a href='login.php'>Identificarse</a>.<br />");
}
// Cargamos la librería de Smarty
    $usuario = $_SESSION['usuario'];
    $smarty = new Smarty;

    $smarty->template_dir = '.././vista/templates/';
    $smarty->compile_dir = '.././vista/templates_c/';
    $smarty->config_dir = '.././vista/configs/';
    $smarty->cache_dir = '.././vista/cache/';

    
$error = "Error";    
$smarty->assign("error", $error);
$smarty->display("error.tpl");