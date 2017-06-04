<?php
require_once('Conexion.php');
require_once('clases/Comentario.php');
class DB_comentario{
    

/*======================ejecutaConsulta ($sql,$valores)======================================
    Accion: Ejecuta una consulta preparada con los valores de los parámetros de la consulta preparada
    Parámetros: $sql es la consulta preparada y parametrizada
                $valores es un array asociativo con los valores de los distintos 
                          parámetros de la consulta anterior
    Retorna =La consulta despues de ejecutarla, o null si no la ha podido ejecutaqr
             en caso de no ejecutarla da un mensaje              
 * ***********************************************************************************************/
    protected static function ejecutaConsulta($sql,$valores) {
        if (Conexion::getConextion() == null) {
            Conexion::conectar();
        }
        $conexion = Conexion::getConextion();
       try{
           $consulta = $conexion->prepare($sql);
           $consulta->execute($valores);
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
       return $consulta;
 
    }
    
    protected static function ejecutaConsultaDev($sql,$valores) {
        if (Conexion::getConextion() == null) {
            Conexion::conectar();
        }
        $conexion = Conexion::getConextion();
       try{
           $consulta = $conexion->prepare($sql);
           $consulta->execute($valores);
           $lastId = $conexion->lastInsertId();
           
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
       return $lastId;
 
    }
    //Obtiene los comentarios del registro
     public static function obtieneComentarios($id_registro) {
        $consulta ="select * from comentarios where id_registro=:id_registro";
        $valores[":id_registro"]=$id_registro;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($c= $resultado->fetch()) {
            $com[] = new Comentario($c);
        }
        return $com;
    }
    //Enviar comentarios
    public static function enviarComentario($valores){
        try{
            $consulta_1 ="insert into comentarios (texto, fecha, id_registro, id_usuario_c) values (?,?,?,?)";            //Devuelve el id de la ultima inserccion-
            $resultado = self::ejecutaConsultaDev($consulta_1, $valores);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
}