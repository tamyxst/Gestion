<?php
require_once('clases/Contacto.php');
require_once('clases/Registro.php');
require_once('clases/Usuario.php');
require_once('Conexion.php');

class DB_registro{
    

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
    
    
    //Sirve para obtener todos los registros de un contacto
    //Todos los campos son obligatorios. De momento incidencias
    public static function obtieneRegistrosPorId($id_contacto) {
        $consulta3 ="select * from registros WHERE id_contacto=?";
        $valores3[] = $id_contacto;
        $resultado3 = self::ejecutaConsulta($consulta3,$valores3);
        while ($reg = $resultado3->fetch()) {
            $registros[] = new Registro($reg);
        }
        return $registros;
    }
    
    public static function obtieneUltimosRegistros() {
        $consulta ="select * from registros order by fecha asc limit 7";
        $resultado = self::ejecutaConsulta($consulta);
        while ($reg = $resultado->fetch()) {
            $registros[] = new Registro($reg);
        }
        return $registros;
    }
    
    //Modifica las imagenes almacenadas en el registro
    public static function editarRegistroImagen($imagen,$id_registro){
        try{
            $consulta_1 ="UPDATE registros SET imagen=? WHERE id_registro=?";
            $valores[]=$imagen;
            $valores[]=$id_registro;
            $resultado=self::ejecutaConsulta($consulta_1, $valores);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
    
    
    /*======================Registros [OTROS]======================================*/
    public static function obtieneRegistros() {
        $consulta ="select * from registros where tipo_reg=:tipo_reg";
        $valores[":tipo_reg"]='otro';
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($reg= $resultado->fetch()) {
            $registros[] = new Registro($reg);
        }
        return $registros;
    }
    
    
    //Obtiene el registro de tipo incidencia por ID de registro
    public static function obtieneRegistro($id_registro) {
        $consulta ="select * from registros where id_registro=? and tipo_reg=?";
        $valores[]=$id_registro;
        $valores[]="otro";
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $reg = $resultado->fetch();
            $registro = new Registro($reg);
        return $registro;
    }
    //Añade un registro de tipo incidencia
    public static function anadirRegistro($valores_1){
        try{
            $consulta_1 ="insert into registros (fecha, estado, material, observaciones, imagen, id_contacto, id_usuario_r, tipo_reg) values (?,?,?,?,?,?,?,?)";            //Devuelve el id de la ultima inserccion-
            $resultado = self::ejecutaConsultaDev($consulta_1, $valores_1);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    //Edita un registro de tipo incidencia que contiene imagen a editar
    public static function editarRegistroCI($valores_1){
        try{
            $consulta_1 ="UPDATE registros SET estado=?, material=?,observaciones=?,imagen=?, id_usuario_r=? WHERE id_registro=?";
            $resultado=self::ejecutaConsulta($consulta_1, $valores_1);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    //Edita un registro de tipo incidencia que no contiene imagen
    public static function editarRegistroSI($valores_1){
        try{
            $consulta_1 ="UPDATE registros SET estado=?, material=?,observaciones=?, id_usuario_r=? WHERE id_registro=?";
            $resultado=self::ejecutaConsulta($consulta_1, $valores_1);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
    
    //Eliminar registro de tipo incidencia
    public static function eliminarRegistro($id_registro){
        try{
            $consulta="DELETE FROM registros WHERE id_registro=?";
            $valores[]=$id_registro;
            $resultado = self::ejecutaConsulta($consulta,$valores);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
}
?>