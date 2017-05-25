<?php
require_once('../modelo/DB.php');
require_once('../modelo/DB_contacto.php');
require_once('Fecha.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registro
 *
 * @author tamara
 */

class Registro {

    //put your code here
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

    public function getIdReg() {
        return $this->id_registro;
    }

    public function getFechaReg() {
        return $this->fecha->getFecha();
    }
    public function getFechaNormalReg() {
        return $this->fecha->getFechaNormal();
    }

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

    public function getMaterialReg() {
        return $this->material;
    }

    public function getObservacionesReg() {
        return $this->observaciones;
    }

    //Devuelve array de imagenes
    public function getImagenRegArreglo() {
        $imagenes = explode('+', $this->imagen);
        return $imagenes;
    }
    public function getImagenReg() {
        return $this->imagen;
    }

    public function getIdContactoReg() {
        $nombre=self::dameNombreContacto($this->id_contacto);
        return $nombre;
    }
    public function getIdContactoRegId() {
        return $this->id_contacto;
    }

    public function getIdUsuarioReg() {
        $nombreU=DB::dameNombreUsuario($this->id_usuario_r);
        return $nombreU;
    }

    public function getTipoReg() {
        return $this->tipo_reg;
    }

    public function getPrioridadReg() {
        return $this->prioridad;
    }

    public function getArchivarReg() {
        return $this->archivar;
    }

    public function getFechaEntregaReg() {
        return $this->fecha->getFechaNormal();
    }
    public function dameNombreContacto($id_contacto){
        $contacto=DB_contacto::buscarContactoId($id_contacto);
        if($contacto!=null){
            $nombre=$contacto->getNombreContacto();
            return $nombre;
        }
        return null;
    }
}
