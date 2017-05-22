<?php
require_once('Fecha.php');
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

    public function getIdMensaje() {
        return $this->id_mensaje;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getArchivar() {
        return $this->archivar;
    }

    public function getFecha() {
        return $this->fecha->getFecha();
    }

    public function getDestinatario() {
        return $this->destinatario;
    }

    public function getIdUsuarioM() {
        return $this->id_usuario_m;
    }

    public function getNombreEmisor() {
        return $this->nombreEmisor;
    }

    public function nombreEmi($id_usuario_m) {
        $nombre = DB::dameNombreUsuario($id_usuario_m);
        return $nombre;
    }

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