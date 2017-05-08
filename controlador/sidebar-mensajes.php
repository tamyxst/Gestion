<?php
session_start();
// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario']))
    
    //header("Location: error.php");
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$mensajes = DB::obtieneMensajesNuevos();
$numMensajes = count($mensajes);
?>