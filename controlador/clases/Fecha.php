<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fecha
 *
 * @author tamara
 */
class Fecha {
    //put your code here
    protected $datetime;
    
    public function __construct($datetime) {
        $this->datetime = $datetime;
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

    public function cambiaFmysql($datetime) {
        $fechaSql = date("Y-m-d H:i:s'", strtotime($datetime));
        return $fechaSql;
    }
    public function getFecha(){
        return $this->time_elapsed_string($this->datetime);
    }
    public function getFechaNormal(){
        $fechaN = date("d-m-Y", strtotime($this->datetime));
        return $fechaN;
    }
}
