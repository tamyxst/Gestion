<?php
require_once('../modelo/DB.php');
require_once('../modelo/DB_contacto.php');
require_once('Fecha.php');
/**
* Clase Registro
* Corresponde a los mensajes almacenados en el sistema.
* Los mensajes los envían los usuarios del sistema.
*
* @author Tamara Gascón Moreno
* Gestión Algo v2
* 
*/
class Registro {

    protected $id_registro;
    protected $fecha;
    protected $estado;
    protected $material;
    protected $observaciones;
    protected $imagen;
    protected $id_contacto;
    protected $id_usuario_r;
    protected $tipo_reg;
    protected $prioridad;
    protected $archivar;
    protected $fecha_entrega;

    public function __construct($row) {
        $this->id_registro = $row['id_registro'];
        $this->fecha = new Fecha($row['fecha']);
        $this->estado = $row['estado'];
        $this->material = $row['material'];
        $this->observaciones = $row['observaciones'];
        $this->imagen = $row['imagen'];
        $this->id_contacto = $row['id_contacto'];
        $this->id_usuario_r = $row['id_usuario_r'];
                
        $this->tipo_reg = $row['tipo_reg'];
        if ($row['tipo_reg'] == 'incidencia') {
            $this->prioridad = $row['prioridad'];
            $this->archivar = $row['archivar'];
        }
        if ($row['tipo_reg'] == 'pedido') {
            $this->fecha_entrega = new Fecha($row['fecha_entrega']);
        }
    }
    /**
     * Método que devuelve el id_registro del registro
     * @return id_registro
     */
    public function getIdReg() {
        return $this->id_registro;
    }
    
    /**
     * Método que devuelve la fecha del registro
     * @return fecha
     */
    public function getFechaReg() {
        return $this->fecha->getFecha();
    }
    /**
     * Método que devuelve la fecha con formato normal
     * @return fecha normal
     */
    public function getFechaNormalReg() {
        return $this->fecha->getFechaNormal();
    }
    /**
     * Método que devuelve una cadena con el estado del registro
     * @return cadena
     */
    public function getEstadoReg() {
         switch($this->estado){
             case 0:
                 return 'Pendiente';
                 break;
             case 1:
                 return 'Modificada';
                 break;
             case 2:
                 return 'Finalizada';
                 break;
         }
    }
    /**
     * Método que devuelve el material que se ha insertado en el registro
     * @return material
     */
    public function getMaterialReg() {
        return $this->material;
    }
    /**
     * Método que devuelve las observaciones que se han insertado en el registro
     * @return type
     */
    public function getObservacionesReg() {
        return $this->observaciones;
    }

    //Devuelve array de imagenes
    public function getImagenRegArreglo() {
        $imagenes = explode('+', $this->imagen);
        return $imagenes;
    }
    /**
     * Método que devuelve la imagen del registro
     * @return imagen
     */
    public function getImagenReg() {
        return $this->imagen;
    }
    /**
     * Método que devuelve el nombre del contacto al que se le ha asignado el registro
     * @return nombre
     */
    public function getIdContactoReg() {
        $nombre=self::dameNombreContacto($this->id_contacto);
        return $nombre;
    }
    /**
     * Método que devuelve el id_contacto al que se le ha asignado el registro
     * @return id_contacto
     */
    public function getIdContactoRegId() {
        return $this->id_contacto;
    }
    /**
     * Método que devuelve el nombre del usuario al que se le ha asignado el registro
     * @return type
     */
    public function getIdUsuarioReg() {
        $nombreU=DB::dameNombreUsuario($this->id_usuario_r);
        return $nombreU;
    }
    
    /**
     * Método que devuelve el tipo de registro que es (incidencia, pedido u otro)
     * @return tipo_reg
     */
    public function getTipoReg() {
        return $this->tipo_reg;
    }
    /**
     * Método que devuelve la prioridad si es incidencia
     * @return prioridad
     */
    public function getPrioridadReg() {
        return $this->prioridad;
    }
    /**
     * Método que devuelve la si el registro esta archivado, si es incidencia
     * @return archivar
     */
    public function getArchivarReg() {
        return $this->archivar;
    }
    /**
     * Método que devuelve la fecha_entrega si es pedido
     * @return type
     */
    public function getFechaEntregaReg() {
        return $this->fecha_entrega->getFechaNormal();
    }
    /**
     * Método que devuelve el nombre del contacto
     * @param type $id_contacto del contacto (cliente o proveedor)
     * @return devuelve el nombre, sino existe null
     */
    public function dameNombreContacto($id_contacto){
        $contacto=DB_contacto::buscarContactoId($id_contacto);
        if($contacto!=null){
            $nombre=$contacto->getNombreContacto();
            return $nombre;
        }
        return null;
    }
}
