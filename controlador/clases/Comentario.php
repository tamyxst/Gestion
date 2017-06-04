<?php
require_once('../modelo/DB.php');
require_once('Fecha.php');

/**
* Clase Comentario 
* Corresponde a los comentarios insertados en el sistema.
* Los comentarios son insertados por los usuarios.
* Los comentarios son insertados en cada registro.
* 
* @author Tamara Gascón Moreno
* Gestión Algo v2
* 
*/

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
    /**
     * Método que devuelve el id_comentario del comentario
     * @return el id_comentario
     */
    public function getIdComentario(){
        return $this->id_comentario;
    }
    /**
     * Método que devuelve el texto del comentario (cuerpo)
     * @return el texto del comentario
     */
    public function getTextoComentario(){
        return $this->texto;
    }
    /**
     * Método que devuelve la fecha del comentario
     * @return fecha comentario
     */
    public function getFechaComentario(){
        return $this->fecha->getFecha();
    }
    /**
     * Método que devuelve el id_registro del cual se ha insertado el comentario
     * @return id_registro  
     */
    public function getIdRegistroComentario(){
        return $this->id_registro;
    }
    /**
     * Devuelve el id_usuario del usuario que ha insertado el comentario
     * @return id_usuario
     */
    public function IdUsuarioComentario(){
        return $this->id_usuario_c;
    }
    /**
     * Devuelve el nombre del usuario que ha insertado el comentario
     * @return nombre de usuario
     */
    public function nomUsuarioComentario(){
        $nombre=DB::dameNombreUsuario($this->id_usuario_c);
        return $nombre;
    }
}
