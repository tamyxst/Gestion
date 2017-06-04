
<?php

require_once('../modelo/DB_contacto.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) {
//header("Location: error.php");
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
} 
//Recojo la búsqueda
$search = filter_input(INPUT_POST, 'search');
$dni = explode('-', $search); //Separamos el dni del nombre x00000 - nombre
$contacto=DB_contacto::buscarContacto($dni[0]); //Buscamos el contacto por dni
if($contacto===null){
    //Si no encuentra el contacto error
    header("Location: gestion-incidencias.php?state=no");
}else{
    switch ($contacto->getTipoContacto()){
        case 'cliente':
            header("Location: gestion-clientes.php?id=".$contacto->getIdContacto());
            break;
        case 'proveedor':
            header("Location: gestion-proveedores.php?id=".$contacto->getIdContacto());
            break;
        }
}