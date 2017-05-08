<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function getNombreCompleto(){
        return $this->nombre_completo;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    
}

?>