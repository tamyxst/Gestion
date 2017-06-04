<?php
require_once('clases/Contacto.php');
require_once('clases/Registro.php');
require_once('clases/Usuario.php');
require_once('Conexion.php');

class DB_pedido{
    
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
    
    /*=============Pedidos==================*/
    
    public static function obtienePedidos() {
        $consulta ="select * from registros JOIN pedidos on registros.id_registro = pedidos.id_pedido";
        $resultado = self::ejecutaConsulta($consulta);
        while ($reg = $resultado->fetch()) {
            $registros[] = new Registro($reg);
        }
        return $registros;
    }
    
    
    //Obtiene el registro de tipo pedido por ID de registro
    public static function obtienePedido($id_registro) {
        $consulta ="select * from registros JOIN pedidos on registros.id_registro = pedidos.id_pedido where id_registro=:id_registro";
        $valores[":id_registro"]=$id_registro;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $reg = $resultado->fetch();
        $registro = new Registro($reg);
        return $registro;
    }
    //Añade un registro de tipo pedido
    public static function anadirPedido($valores_1,$fecha_entrega){
        try{
            $consulta_1 ="insert into registros (fecha, estado, material, observaciones, imagen, id_contacto, id_usuario_r, tipo_reg) values (?,?,?,?,?,?,?,?)";            //Devuelve el id de la ultima inserccion-
            $lastId = self::ejecutaConsultaDev($consulta_1, $valores_1);
            
            //Se ingresa el telefono con el mismo id
            $consulta_2 ="insert into pedidos (id_pedido, fecha_entrega) values (?,?)";
            
            $valores_2[]=$lastId;
            $valores_2[]=$fecha_entrega;
            $resultado=self::ejecutaConsulta($consulta_2, $valores_2);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    //Edita un registro de tipo incidencia que contiene imagen a editar
    public static function editarPedidoCI($valores_1,$fecha_entrega,$id_pedido){
        try{
            $consulta_1 ="UPDATE registros SET estado=?, material=?,observaciones=?,imagen=?, id_usuario_r=? WHERE id_registro=?";
            
            self::ejecutaConsulta($consulta_1, $valores_1);
            $consulta_2 ="UPDATE pedidos SET fecha_entrega=? WHERE id_pedido=?";
            $valores_2[]=$fecha_entrega;
            $valores_2[]=$id_pedido;
            
            $resultado=self::ejecutaConsulta($consulta_2, $valores_2);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    //Edita un registro de tipo incidencia que no contiene imagen
    public static function editarPedidoSI($valores_1,$fecha_entrega,$id_pedido){
        try{
            $consulta_1 ="UPDATE registros SET estado=?, material=?,observaciones=?, id_usuario_r=? WHERE id_registro=?";
            
            self::ejecutaConsulta($consulta_1, $valores_1);
            $consulta_2 ="UPDATE pedidos SET fecha_entrega=? WHERE id_pedido=?";
            $valores_2[]=$fecha_entrega;
            $valores_2[]=$id_pedido;
            
            $resultado=self::ejecutaConsulta($consulta_2, $valores_2);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }

    //Eliminar registro de tipo incidencia
    public static function eliminarPedido($id_registro){
        try{
            $consulta_1 ="DELETE FROM pedidos WHERE id_pedido=?";
            $valores[]=$id_registro;
            self::ejecutaConsulta($consulta_1, $valores);
            $consulta_2="DELETE FROM registros WHERE id_registro=?";
            $resultado = self::ejecutaConsulta($consulta_2,$valores);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
}
