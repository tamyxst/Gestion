<?php
require_once('Fecha.php');
/**
* Clase Mensaje
* Corresponde a los mensajes almacenados en el sistema.
* Los mensajes los envían los usuarios del sistema.
*
* @author Tamara Gascón Moreno
* Gestión Algo v2
* 
*/
class Mensaje {

    protected $id_mensaje;
    protected $mensaje;
    protected $archivar;
    protected $fecha;
    protected $destinatario;
    protected $id_usuario_m;
    protected $nombreEmisor;

    public function __construct($row) {
        $this->id_mensaje = $row['id_mensaje'];
        $this->mensaje = $row['mensaje'];
        $this->archivar = $row['archivar'];
        $this->fecha = new Fecha($row['fecha']);
        $this->destinatario = $row['destinatario'];
        $this->id_usuario_m = $row['id_usuario_m'];
        $this->nombreEmisor = $this->nombreEmi($this->id_usuario_m);
    }
    /**
     * Método que devuelve el id_mensaje
     * @return id_mensaje
     */
    public function getIdMensaje() {
        return $this->id_mensaje;
    }

    /**
     * Método que devuelve el cuerpo del mensaje
     * @return mensaje
     */
    public function getMensaje() {
        return $this->mensaje;
    }
    /**
     * Método que devuelve si el mensaje ha sido marcado como leído
     * @return archivar
     */
    public function getArchivar() {
        return $this->archivar;
    }
    /**
     * Método que devuelve la fecha del mensaje
     * @return fecha
     */
    public function getFecha() {
        return $this->fecha->getFecha();
    }
    /**
     * Método que devuelve el destinatario, que corresponde al id del usuario
     * @return destinatario
     */
    public function getDestinatario() {
        return $this->destinatario;
    }
    /**
     * Método que devuelve el id_usuario_m que ha enviado el mensaje
     * @return id_usuario_m
     */
    public function getIdUsuarioM() {
        return $this->id_usuario_m;
    }
    /**
     * Método que devuelve el nombre del id_usuario_m (emisor del mensaje)
     * @return nombreEmisor
     */
    public function getNombreEmisor() {
        return $this->nombreEmisor;
    }
    /**
     * Método que recoge el nombre del emisor a través de una consulta a BD, pasando el id_usuario_m
     * @param type $id_usuario_m corresponde al id_usuario de usuarios
     * @return nombre
     */
    public function nombreEmi($id_usuario_m) {
        $nombre = DB::dameNombreUsuario($id_usuario_m);
        return $nombre;
    }
    /**
     * Método que corta el texto si sobrepasa los 32 caracteres
     * @return cadena de texto recortada
     */
    public function getMensajeCorto() {
        if (strlen($this->mensaje) >= 32) {
            $msj = substr($this->mensaje, 0, 32);
            $cadena = $msj . "...";
        } else {
            return $this->mensaje;
        }
        return $cadena;
    }
}

?> 