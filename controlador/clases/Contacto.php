<?php

/**
 * Description of Contacto
 *
 * @author tamara
 */
class Contacto {
    protected $id_contacto;
    protected $dni;
    protected $nombre;
    protected $direccion;
    protected $ciudad;
    protected $cod_postal;
    protected $email;
    protected $telefono;
    protected $tipo;
    protected $sector;
    protected $contacto;
    
    public function __construct($row) {
        if($row['tipo']=='cliente'){
            $this->id_contacto = $row['id_contacto'];
        }else{
            $this->id_contacto = $row['id_proveedor'];
        }
        $this->dni = $row['dni'];
        $this->nombre = $row['nombre'];
        $this->direccion= $row['direccion'];
        $this->ciudad = $row['ciudad'];
        $this->cod_postal = $row['cod_postal'];
        $this->email = $row['email'];
        $this->tipo = $row['tipo'];
        $this->telefono = $row['telefono'];
        if($row['tipo']=='proveedor'){
             $this->sector = $row['sector'];
             $this->contacto=$row['contacto'];
        }
       
    }
    public function getIdContacto(){
        return $this->id_contacto;
    }
    public function getDniContacto(){
        return $this->dni;
    }
    public function getNombreContacto(){
        return $this->nombre;
    }
    public function getDireccionContacto(){
        return $this->direccion;
    }
    public function getCiudadContacto(){
        return $this->ciudad;
    }
    public function getCodPostalContacto(){
        return $this->cod_postal;
    }
    public function getEmailContacto(){
        return $this->email;
    }
    public function getTipoContacto(){
        return $this->tipo;
    }
    public function getTelefonoContacto(){
        return $this->telefono;
    }
    public function getSector(){
        return $this->sector;
    }
    public function getPersonaContacto(){
        return $this->contacto;
    }
}
