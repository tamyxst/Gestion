<?php

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) {
    //header("Location: .././controlador/error.php");
    die("Error - debe <a href='.././controlador/login.php'>identificarse</a>.<br />");
} else {
    $usuario = $_SESSION['usuario'];

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'gestion');

    if (isset($_GET['term'])) {
        $return_arr = array();
        try {
            $conn = new PDO("mysql:host=" . DB_SERVER . ";port=80;dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('SELECT dni, nombre FROM contactos WHERE nombre LIKE :term');
            $stmt->execute(array('term' => '%' . $_GET['term'] . '%'));

            while ($row = $stmt->fetch()) {
                //$return_arr[] =  $row['dni'];
                $contacto = utf8_encode($row['dni']) . "-" . utf8_encode($row['nombre']);
                $return_arr[] = $contacto;
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        /* Toss back results as json encoded array. */
        echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
    }
}

?>
