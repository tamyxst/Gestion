<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
        //$this->fecha = $this->cambiaFnormal($row['fecha']);
        $this->fecha = $row['fecha'];
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
        return $this->fecha;
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

    public function cambiaFnormal($fecha) {
        $fechaN = date("d-m-Y H:i:s'", strtotime($fecha));
        return $fechaN;
    }

    public function cambiaFmysql($fecha) {
        $fechaSql = date("Y-m-d H:i:s'", strtotime($fecha));
        return $fechaSql;
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

    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'año',
            'm' => 'mes',
            'w' => 'semana',
            'd' => 'dia',
            'h' => 'hora',
            'i' => 'minuto',
            's' => 'segundo',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? ' hace ' . implode(', ', $string) : 'justo ahora';
    }

}

?>