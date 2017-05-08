<?php

class Conexion{
    //atributo privado de conexión
    private static $conexion;
 
  /*======================conectar()======================================
     conecta con la base de datos, usando PDO
     da valor al atributo privado y estático $conexion de la clase
     En caso de no conectarse aborta la app y muestra un mensaje
   ****************************************************************************************** */
    public static function conectar(){
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=gestion"; //dwes
        $usuario = 'root'; //root
        $contrasena = 'root'; //root
        try{
           $conexion= new PDO($dsn, $usuario, $contrasena, $opc);
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
             die ('Abortamos la aplicación por fallo conectando con la BD' . $e->getMessage());
         }
         self::$conexion = $conexion;
 
    }
    public static function getConextion(){
        return self::$conexion;
    }
}


?>