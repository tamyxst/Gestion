<?php

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
        $this->fecha = $row['fecha'];
        $this->estado = $row['estado'];
        $this->material = $row['material'];
        $this->observaciones = $row['observaciones'];
        $this->imagen = $row['imagen'];
        $this->id_contacto = $row['id_contacto'];
        $this->id_usuario_r = $row['id_usuario_r'];
        $this->tipo_reg = $row['tipo_reg'];
        if ($row['tipo'] == 'incidencia') {
            $this->prioridad = $row['prioridad'];
            $this->archivar = $row['archivar'];
        }
        if ($row['tipo'] == 'pedido') {
            $this->fecha_entrega = $row['fecha_entrega'];
        }
    }

    public function getIdReg() {
        return $this->registro;
    }

    public function getFechaReg() {
        return $this->fecha;
    }

    public function getEstadoReg() {
        return $this->estado;
    }

    public function getMaterialReg() {
        return $this->material;
    }

    public function getObservacionesReg() {
        return $this->observaciones;
    }

    public function getImagenReg() {
        return $this->imagen;
    }

    public function getIdContactoReg() {
        return $this->id_contacto;
    }

    public function getIdUsuarioReg() {
        return $this->registro;
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
        return $this->fecha_entrega;
    }

}
