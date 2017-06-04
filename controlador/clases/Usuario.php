<?php
/**
* Clase Usuario
* Corresponde a los usuario almacenados en el sistema.
*
* @author Tamara Gascón Moreno
* Gestión Algo v2
* 
*/

class Usuario{
    protected $id_usuario;
    protected $nombre_completo;
    protected $dni;
    protected $email;
    protected $password;
    
    public function __construct($row) {
        $this->id_usuario=$row['id_usuario'];
        $this->nombre_completo=$row['nombre_completo'];
        $this->dni=$row['dni'];
        $this->email=$row['email'];
        $this->password=$row['password'];
    }
    /**
     * Método que devuelve el id_usuario
     * @return id_usuario
     */
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    /**
     * Método que devuelve el nombre completo del usuario
     * @return nombre_completo
     */
    public function getNombreCompleto(){
        $usuario = ucwords($this->nombre_completo, " ");
        return $usuario;
    }
    /**
     * Método que devuelve el dni del usuario 
     * @return dni
     */
    public function getDni(){
        return $this->dni;
    }
    /**
     * Método que devuelve el email del usuario
     * @return email
     */
    public function getEmail(){
        return $this->email;
    }
    /**
     * Método que devuelve la contraseña del usuario
     * @return password
     */
    public function getPassword(){
        return $this->password;
    }
    
}

?>