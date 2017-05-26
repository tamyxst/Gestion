<?php
require_once('../modelo/DB.php');
require_once('Fecha.php');
class Comentario {
    protected $id_comentario;
    protected $texto;
    protected $fecha;
    protected $id_registro;
    protected $id_usuario_c;
    
    public function __construct($row) {
        $this->id_comentario = $row['id_comentario'];
        $this->texto = $row['texto'];
        $this->fecha = new Fecha($row['fecha']);
        $this->id_registro = $row['id_registro'];
        $this->id_usuario_c = $row['id_usuario_c'];
    }
    public function getIdComentario(){
        return $this->id_comentario;
    }
    public function getTextoComentario(){
        return $this->texto;
    }
    public function getFechaComentario(){
        return $this->fecha->getFecha();
    }
    public function getIdRegistroComentario(){
        return $this->id_registro;
    }
    public function IdUsuarioComentario(){
        return $this->id_usuario_c;
    }
    public function nomUsuarioComentario(){
        $nombre=DB::dameNombreUsuario($this->id_usuario_c);
        return $nombre;
    }
}
