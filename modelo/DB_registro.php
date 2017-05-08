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
    /*=============Registros==================*/
    //Todos los campos son obligatorios.
    public static function obtieneIncidencias() {
        $consulta ="select * from registros JOIN incidencias on registros.id_registro = incidencias.id_incidencia";
        $resultado = self::ejecutaConsulta($consulta);
        while ($reg = $resultado->fetch()) {
        //Se crea un objeto de la clase Producto y lo añadimos al array.
        //$p tiene filas.
            $registros[] = new Registro($reg);
        }
        return $registros;
    }
    
    public static function obtieneIncidencia($id_registro) {
        $consulta ="select * from registros JOIN incidencias on registros.id_registro = incidencias.id_incidencia where id_registro=:id_registro";
        $valores[":id_registro"]=$id_registro;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $reg = $resultado->fetch();
            $registro = new Registro($reg);
        
        return $registro;
    }
    
    //OTROS REGISTROS
    public static function obtieneOtrosRegistros() {
        $consulta ="select * from registros where tipo_reg=:tipo_reg";
        $valores[":tipo_reg"]='otro';
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($reg= $resultado->fetch()) {
        //Se crea un objeto de la clase Producto y lo añadimos al array.
        //$p tiene filas.
            $registros[] = new Registro($reg);
        }
        return $registros;
    }
    
    public static function obtieneRegistro($id_contacto) {
        $consulta ="select * from registros where tipo_reg=:tipo_reg";
        $valores[":tipo_reg"]='otro';
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $reg = $resultado->fetch();
            $registro = new Registro($reg);
        
        return $registro;
    }
    
    /*
     *PENDIENTE INNER REGISTROS DEL CLIENTE
     */
    public static function buscarIncidencia($dni){
        $consulta ="select * from contactos where dni=:dni ";
        $valores[":dni"]=$dni;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $c = $resultado->fetch();
        if($c!=null){
            $cliente = new Contacto($c);
        }
        return $cliente;
    }
    
    public static function anadirIncidencia($valores_1,$prioridad,$archivar){
        try{
            $consulta_1 ="insert into registros (fecha, estado, material, observaciones, imagen, id_contacto, id_usuario_r, tipo_reg values (?,?,?,?,?,?,?,?)";            //Devuelve el id de la ultima inserccion-
            $lastId = self::ejecutaConsultaDev($consulta_1, $valores_1);
            
            //Se ingresa el telefono con el mismo id
            $consulta_2 ="insert into incidencias (id_incidencia, prioridad, archivar) values (?,?,?)";
            //$valores_2 = array('id_contacto' => (int) $lastId, 'telefono'=> $telefono);
            $valores_2[]=$lastId;
            $valores_2[]=$prioridad;
            $valores_2[]=$archivar;
            $resultado=self::ejecutaConsulta($consulta_2, $valores_2);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        //$r = $resultado->fetch(PDO::FETCH_ASSOC); 
        return $resultado;
    }
    
    public static function editarIncidencia($valores_1,$prioridad,$archivar,$id_incidencia){
        try{
            $consulta_1 ="UPDATE registros SET estado=?, material=?,observaciones=?,imagen=?, id_usuario_r=?, WHERE id_registro=?";
            
            self::ejecutaConsulta($consulta_1, $valores_1);
            $consulta_2 ="UPDATE incidencias SET prioridad=?, archivar=? WHERE id_incidencia=?";
            $valores_2[]=$prioridad;
            $valores_2[]=$archivar;
            $valores_2[]=$id_incidencia;
            
            $resultado=self::ejecutaConsulta($consulta_2, $valores_2);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
    public static function eliminarProveedor($id_contacto){
        try{
            $consulta_1 ="DELETE FROM telcontactos WHERE id_contacto=?";
            $valores[]=$id_contacto;
            self::ejecutaConsulta($consulta_1, $valores);
            $consulta_2="DELETE FROM proveedores WHERE id_proveedor=?";
            self::ejecutaConsulta($consulta_2,$valores);
            $consulta_3 ="DELETE FROM contactos WHERE id_contacto=?";
            $resultado = self::ejecutaConsulta($consulta_3, $valores);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
    
    public static function anadirCliente($valores_1,$telefono){
        try{
            $consulta_1 ="insert into contactos (dni, nombre, direccion, ciudad, cod_postal, email, tipo) values (?,?,?,?,?,?,?)";
            //Devuelve el id de la ultima inserccion-
            $lastId = self::ejecutaConsultaDev($consulta_1, $valores_1);
            //Se ingresa el telefono con el mismo id
            $consulta_2 ="insert into telcontactos (id_contacto, telefono) values (?,?)";
            //$valores_2 = array('id_contacto' => (int) $lastId, 'telefono'=> $telefono);
            $valores_2[]=$lastId;
            $valores_2[]=$telefono;
            $resultado = self::ejecutaConsulta($consulta_2, $valores_2);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 

        //$r = $resultado->fetch(PDO::FETCH_ASSOC); 
        return $resultado;
    }
    
    
    public static function editarCliente($valores_1,$telefono,$id_contacto){
        try{
            $consulta_1 ="UPDATE contactos SET dni=?, nombre=?,direccion=?,ciudad=?, cod_postal=?, email=? WHERE id_contacto=?";
            
            self::ejecutaConsulta($consulta_1, $valores_1);
            $consulta_2 ="UPDATE telcontactos SET telefono=? WHERE id_contacto=?";
            $valores_2[]=$telefono;
            $valores_2[]=$id_contacto;
            $resultado = self::ejecutaConsulta($consulta_2, $valores_2);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
    public static function eliminarCliente($id_contacto){
        try{
            $consulta_1 ="DELETE FROM telcontactos WHERE id_contacto=?";
            $valores[]=$id_contacto;
            self::ejecutaConsulta($consulta_1, $valores);
            $consulta_2 ="DELETE FROM contactos WHERE id_contacto=?";
            $resultado = self::ejecutaConsulta($consulta_2, $valores);
            
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
}