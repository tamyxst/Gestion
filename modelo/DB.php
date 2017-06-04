
<?php
require_once('clases/Mensaje.php');
require_once('clases/Usuario.php');
require_once('clases/Contacto.php');
require_once('Conexion.php');

class DB {

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
 
 /*======================verificaUsuario ($nombre,$pass)======================================
    Accion: verifica si un nombre y pass son contenidos en la base de datos
    Parámetros: $nombre es el nombre de usuario
                $pass es la password para ese nombre
    Retorna  true o false según se haya podido o no validar
  * Recordar que la pass está cifrada con md5 en la base de datos      
 * ***********************************************************************************************/   
    public static function verificaUsuario($nombre, $password) {
       $valores = array('usuario'=>$nombre, 'password' =>$password);
       $sql = <<<FIN
        SELECT nombre_completo FROM usuarios 
        WHERE nombre_completo=:usuario
        AND password=md5(:password)
FIN;
       $resultado = self::ejecutaConsulta ($sql,$valores);
       $verificado = false;
       if ($resultado->fetch()) {
            $verificado = true;
        }
        return $verificado;
    }
    /**
     * Se devuelve un objeto de tipo usuario con todos los datos del usuario donde 
     * su nombre sea el pasado por parámetro.
     */
    public static function dameDatosUsuario($usuario){
        $consulta ="select * from usuarios WHERE nombre_completo=:nombre_completo";
        $valor[":nombre_completo"]=$usuario;
        $resultado = self::ejecutaConsulta($consulta,$valor);
            
        $u= $resultado->fetch();   
        $user = new Usuario($u);
        return $user;
    }
    /**
     * Se devuelve el nombre del usuario donde su nombre sea el pasado por parámetro.
     */
    public static function dameNombreUsuario($usuario){
        $consulta ="select * from usuarios WHERE id_usuario=:id_usuario";
        $valor[":id_usuario"]=$usuario;
        $resultado = self::ejecutaConsulta($consulta,$valor);
        
        $u= $resultado->fetch();   
        $user = new Usuario($u);
        return $user->getNombreCompleto();
    }
    /**
     * Se devuelve un array de objetos de tipo usuario.
     * @return \Usuario 
     */
    public static function obtieneUsuarios() {
        $consulta ="select * from usuarios";
        $resultado = self::ejecutaConsulta($consulta);
        
        while ($u = $resultado->fetch()) {
            $usuarios[] = new Usuario($u);
        }
        return $usuarios;
    }
    
   
    
    /*======================MENSAJES======================================*/
    
    /**
     * Se devuelve un array de objetos de tipo mensajes que no han sido archivados 
     * y corresponden al id_usuario que esta actualmente conectado.
     * @return \Mensaje
     */
    public static function obtieneMensajesNuevos() {
        //Recojo el usuario activo
        $id_usuario=$_SESSION['id_usuario'];
        
        $consulta ="select * from mensajes where archivar=:archivar and destinatario=:id_usuario";
        $valores = array('archivar'=>0, 'id_usuario' =>$id_usuario);
        $resultado = self::ejecutaConsulta($consulta, $valores);
        
        while ($m = $resultado->fetch()) {
            $mensajes[] = new Mensaje($m);
        }
        return $mensajes;
    }
    
     /**
     * Obtiene array de mensajes (objetos) donde el destinatario sea el usuario conectado
     */
    public static function obtieneMensajes() {
        //Recojo el usuario activo
        $id_usuario=$_SESSION['id_usuario'];
        
        $consulta ="select * from mensajes where destinatario=:id_usuario";
        $valores = array('id_usuario' =>$id_usuario);
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($m = $resultado->fetch()) {
            $mensajes[] = new Mensaje($m);
        }
        return $mensajes;
    }
    /**
     * Obtiene mensaje donde el id_mensaje es el pasado por parámetro y el destinatario es el usuario conectado.
     */
    public static function obtieneMensaje($id_mensaje) {
        //Recojo el usuario activo
        $id_usuario=$_SESSION['id_usuario'];
        
        $consulta ="select * from mensajes where id_mensaje=:id_mensaje and destinatario=:id_usuario";
        $valores = array('id_mensaje' =>$id_mensaje,'id_usuario' =>$id_usuario);
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($m = $resultado->fetch()) {
            $mensaje[] = new Mensaje($m);
        }
        return $mensaje;
    }
    /**
     * Marca el mensaje como leído
     */
    public static function archivarMensaje($id_mensaje){
        $id_usuario=$_SESSION['id_usuario'];
        
        $mensaje='Cambios realizados';
        try{
        $consulta ="update mensajes set archivar=:archivar where id_mensaje=:id_mensaje and destinatario=:id_usuario";
        $valores = array('archivar' => 1,'id_mensaje' =>$id_mensaje,'id_usuario' =>$id_usuario);
        self::ejecutaConsulta($consulta, $valores);
        }catch(PDOException $e){
            echo "No se ha podido $e";
            return null;
        } 
        return $mensaje;
        
    }
    /**
     * Elimina mensaje
     */
    public static function eliminarMensaje($id_mensaje){
        $id_usuario=$_SESSION['id_usuario'];
        $mensaje='Cambios realizados';
        try{
        $consulta ="delete from mensajes where id_mensaje=:id_mensaje and destinatario=:id_usuario";
        $valores = array('id_mensaje' =>$id_mensaje,'id_usuario' =>$id_usuario);
        self::ejecutaConsulta($consulta, $valores);
        }catch(PDOException $e){
            echo "No se ha podido $e";
            return null;
        } 
        return $mensaje;
    }
    
     /**
      * Envia mensaje
      */
     public static function enviarMensaje($cuerpomensaje,$destinatario){
        $id_usuario=$_SESSION['id_usuario'];
        $mensaje='Cambios realizados';
        //H mayúscula para formato 24 horas
        $fecha = date('Y-m-d H:i:s');
        try{
            $consulta ="insert into mensajes (mensaje, archivar, fecha, destinatario, id_usuario_m) values (?,?,?,?,?)";
            $valores[]=$cuerpomensaje;
            $valores[]=0;
            $valores[]=$fecha;
            $valores[]=$destinatario;
            $valores[]=$id_usuario;
            //$valores = array('id_mensaje' =>$id_mensaje,'id_usuario' =>$id_usuario);
            self::ejecutaConsulta($consulta, $valores);
        }catch(PDOException $e){
            echo "No se ha podido $e";
            return null;
        } 
        return $mensaje;
    }
    
    /*=============CLIENTES==================*/
    
    public static function obtieneClientes() {
        $consulta ="select * from contactos where tipo=:tipo";
        $valores = array('tipo' =>'cliente');
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($cl = $resultado->fetch()) {
            $clientes[] = new Contacto($cl);
        }
        return $clientes;
    }
    
    public static function obtieneCliente($id_contacto) {
        $consulta ="select * from contactos where id_contacto=:id_contacto and tipo=:tipo";
        $valores = array('id_contacto' =>$id_contacto,'tipo' =>"cliente");
        $resultado = self::ejecutaConsulta($consulta, $valores);
        while ($cl = $resultado->fetch()) {
            $cliente[] = new Contacto($cl);
        }
        return $cliente;
    }
    
    //Sirve para prov y cliente
    public static function buscarContacto($dni){
        $consulta ="select * from contactos where dni=:dni ";
        $resultado = self::ejecutaConsulta($consulta, $dni);
        while ($cl = $resultado->fetch()) {
            $cliente[] = new Contacto($cl);
        }
        return $cliente;
    }
    
    
    public static function anadirContacto($valores_1,$telefono){
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
        return $resultado;
    }
    

}//End de la clase DB.php
 
?>