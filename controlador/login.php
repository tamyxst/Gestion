<?php
require_once('../modelo/DB.php');

// Cargo la librería de Smarty
require_once('Smarty.class.php');

$smarty = new Smarty;
$smarty->template_dir = '.././vista/templates/';
$smarty->compile_dir = '.././vista/templates_c/';
$smarty->config_dir = '.././vista/configs/';
$smarty->cache_dir = '.././vista/cache/';
// Verifico si queremos validar los datos del formulario o solo visualizar el formulario (login.tpl)
if (isset($_POST['enviar'])) {
    $usuario = filter_input(INPUT_POST, 'usuario');
    $password = filter_input(INPUT_POST, 'password');
    if ((empty($usuario)) || (empty($password))) {
        $smarty->assign('error', 'Debes introducir un nombre de usuario y una contraseña');
    } else {
        // Compruebo las credenciales con la base de datos
        if (DB::verificaUsuario($usuario, $password)) {
            session_start();

            if (!isset($_COOKIE[$usuario])) {
                //Si el usuario accede por primera vez se crea la cookie.
                setcookie($usuario, time(), time() + 3600);
            }

            //Creo la variable de sesión
            $_SESSION['usuario'] = $usuario;
            $datosUsuario = DB::dameDatosUsuario($usuario);

            //Creo más variables de sesión para utilizarlas.
            $_SESSION['id_usuario'] = $datosUsuario->getIdUsuario();


            header("Location: inicio.php");
        } else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $smarty->assign('error', 'Usuario o contraseña no válidos!');
        }
    }
}
// Muestro la plantilla
$smarty->display('login.tpl');
?>