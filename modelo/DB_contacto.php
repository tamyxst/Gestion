<?php
require_once('clases/Contacto.php');
require_once('clases/Usuario.php');
require_once('Conexion.php');
class DB_contacto{
    

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
    
    //Obtiene un array con todos los contactos
    public static function obtieneContactos() {
        $consulta ="select * from contactos";
        $resultado = self::ejecutaConsulta($consulta);
        while ($c = $resultado->fetch_assoc()) {
            $texto.="" .$c['nombre'].$c['dni'].'",';
        }
        return $texto;
    }
    
    /*=============CLIENTES==================*/
    
    //Todos los campos son obligatorios.
    public static function obtieneClientes() {
        $consulta ="select * from contactos JOIN telcontactos USING (id_contacto) where tipo=:tipo";
        $valores = array('tipo' =>'cliente');
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($cl = $resultado->fetch()) {
        //Se crea un objeto de la clase Producto y lo añadimos al array.
        //$p tiene filas.
            $clientes[] = new Contacto($cl);
        }
        return $clientes;
    }
    
    public static function obtieneCliente($id_contacto) {
        $consulta ="select * from contactos JOIN telcontactos USING (id_contacto) where id_contacto=:id_contacto";
        $valores[":id_contacto"]=$id_contacto;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $c = $resultado->fetch();
            $cliente = new Contacto($c);
        
        return $cliente;
    }
    
    //Todos los campos son obligatorios.
    public static function obtieneProveedores() {
        $consulta ="select * from contactos inner JOIN telcontactos on contactos.id_contacto = telcontactos.id_contacto inner join proveedores on contactos.id_contacto = proveedores.id_proveedor where tipo=:tipo";
        $valores = array('tipo' =>'proveedor');
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($cl = $resultado->fetch()) {
        //Se crea un objeto de la clase Producto y lo añadimos al array.
        //$p tiene filas.
            $clientes[] = new Contacto($cl);
        }
        return $clientes;
    }
    
    //PROVEEDORES
    
    public static function obtieneProveedor($id_contacto) {
        $consulta ="select * from contactos JOIN telcontactos on contactos.id_contacto = telcontactos.id_contacto inner join proveedores on contactos.id_contacto = proveedores.id_proveedor where contactos.id_contacto=:id_contacto";
        $valores[":id_contacto"]=$id_contacto;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $c = $resultado->fetch();
            $cliente = new Contacto($c);
        
        return $cliente;
    }
    
    //Sirve para prov y cliente
    public static function buscarContacto($dni){
        $consulta ="select * from contactos where dni=:dni ";
        $valores[":dni"]=$dni;
        $resultado = self::ejecutaConsulta($consulta, $valores);
        $c = $resultado->fetch();
        if($c!=null){
            $contacto = new Contacto($c);
        }
        return $contacto;
    }
    
   //Sirve para prov y cliente
    public static function buscarContactoId($id_contacto){
        $consulta ="select * from contactos where id_contacto=:id_contacto";
        $valor[":id_contacto"]=$id_contacto;
        $resultado = self::ejecutaConsulta($consulta, $valor);
        while ($c = $resultado->fetch()) {
            $contacto = new Contacto($c);
        }
        return $contacto;
    }
    
    public static function anadirProveedor($valores_1,$telefono,$sector,$contacto){
        try{
            $consulta_1 ="insert into contactos (dni, nombre, direccion, ciudad, cod_postal, email, tipo) values (?,?,?,?,?,?,?)";
            //Devuelve el id de la ultima inserccion-
            $lastId = self::ejecutaConsultaDev($consulta_1, $valores_1);
            
            //Se ingresa el telefono con el mismo id
            $consulta_2 ="insert into telcontactos (id_contacto, telefono) values (?,?)";
            //$valores_2 = array('id_contacto' => (int) $lastId, 'telefono'=> $telefono);
            $valores_2[]=$lastId;
            $valores_2[]=$telefono;
            self::ejecutaConsulta($consulta_2, $valores_2);
            
            $consulta_3 = "insert into proveedores (id_proveedor, sector, contacto) values (?,?,?)";
            $valores_3[] = $lastId;
            $valores_3[] = $sector;
            $valores_3[] = $contacto;
            $resultado = self::ejecutaConsulta($consulta_3, $valores_3);
        }catch(PDOException $e){
            echo "No se ha podido";
            return null;
        } 
        return $resultado;
    }
    
    public static function editarProveedor($valores_1,$telefono,$id_contacto,$sector,$contacto){
        try{
            $consulta_1 ="UPDATE contactos SET dni=?, nombre=?,direccion=?,ciudad=?, cod_postal=?, email=? WHERE id_contacto=?";
            
            self::ejecutaConsulta($consulta_1, $valores_1);
            $consulta_2 ="UPDATE telcontactos SET telefono=? WHERE id_contacto=?";
            $valores_2[]=$telefono;
            $valores_2[]=$id_contacto;
            self::ejecutaConsulta($consulta_2, $valores_2);
            
            $consulta_3 = "UPDATE proveedores SET sector=?,contacto=? WHERE id_proveedor=?";
            $valores_3[]=$sector;
            $valores_3[]=$contacto;
            $valores_3[]=$id_contacto;
            $resultado = self::ejecutaConsulta($consulta_3, $valores_3);
            
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
?>