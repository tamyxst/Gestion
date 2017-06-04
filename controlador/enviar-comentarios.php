<?php
require_once('../modelo/DB_comentario.php');
session_start();
// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) {

//header("Location: error.php");
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

if (isset ($_POST['enviar_comentario'])){
    //Recogemos los datos
    $texto = filter_input(INPUT_POST,'comentario');
    $fecha = date('Y-m-d H:i:s'); //H mayúscula para formato 24 horas
    $id_registro = filter_input(INPUT_POST,'id_registro_com');
    $id_usuario_c = $_SESSION['id_usuario']; //id_usuario remitente
    
    if($texto==""){
        die(header("Location: error.php"));   
    }
    
    $valores[] = $texto;
    $valores[] = $fecha;
    $valores[] = $id_registro;
    $valores[] = $id_usuario_c;
    
    DB_comentario::enviarComentario($valores);    
}
$id_registro=$_GET['id'];
$comentarios=DB_comentario::obtieneComentarios($id_registro);