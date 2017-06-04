<?php
require_once('../modelo/DB_registro.php');
/**
* Clase Contacto
* Corresponde a los contactos almacenados en el sistema.
* Estos contactos pueden ser: clientes o proveedores.
*
* @author Tamara Gascón Moreno
* Gestión Algo v2
* 
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
    protected $numReg;
    
    public function __construct($row) {
        $this->id_contacto = $row['id_contacto'];
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
        $this->numReg = self::numeroRegistrosContacto($this->id_contacto);
    }
    /**
     * Método que devuelve el id_contacto del contacto
     * @return id_contacto
     */
    public function getIdContacto(){
        return $this->id_contacto;
    }
    /**
     * Método que devuelve el dni del contacto
     * @return dni
     */
    public function getDniContacto(){
        return $this->dni;
    }
    /**
     * Método que devuelve el nombre del contacto
     * @return nombre
     */
    public function getNombreContacto(){
        return $this->nombre;
    }
    /**
     * Método que devuelve el dirección del contacto
     * @return direccion
     */
    public function getDireccionContacto(){
        return $this->direccion;
    }
    /**
     * Método que devuelve la ciudad del contacto
     * @return ciudad
     */
    public function getCiudadContacto(){
        return $this->ciudad;
    }
    /**
     * Método que devuelve el código postal del contacto
     * @return cod_postal
     */
    public function getCodPostalContacto(){
        return $this->cod_postal;
    }
    /**
     * Método que devuelve el email del contacto
     * @return email
     */
    public function getEmailContacto(){
        return $this->email;
    }
    /**
     * Método que devuelve el tipo de contacto, cliente o proveedor
     * @return tipo
     */
    public function getTipoContacto(){
        return $this->tipo;
    }
    /**
     * Método que devuelve el telefono del contacto
     * @return telefono
     */
    public function getTelefonoContacto(){
        return $this->telefono;
    }
    /**
     * Método que devuelve el sector del proveedor
     * @return sector
     */
    public function getSector(){
        return $this->sector;
    }
    /**
     * Método que devuelve la persona de contacto del proveedor
     * @return contacto
     */
    public function getPersonaContacto(){
        return $this->contacto;
    }
    /**
     * Método que devuelve el número de registros que tiene el contacto asignados
     * @return numReg
     */
    public function getNumReg(){
        return $this->numReg;
    }
    /**
     * Método que calcula el número registros que tiene el contacto asignados
     * @param $id_contacto corresponde al identificador del contacto.
     * @return devuelve el numReg (numero registros).
     */
    public function numeroRegistrosContacto($id_contacto){
        $registros=DB_registro::obtieneRegistrosPorId($id_contacto);
        $numReg=count($registros);
        return $numReg;
    }
}