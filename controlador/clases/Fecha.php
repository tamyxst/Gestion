<?php
/**
* Clase Fecha
* Corresponde a la clase fecha.
*
* @author Tamara Gascón Moreno
* Gestión Algo v2
* 
*/
class Fecha {
    
    protected $datetime;
    
    public function __construct($datetime) {
        $this->datetime = $datetime;
    }
    /**
     * Método que calcula desde la hora y fecha actuales, el tiempo transcurrido desde que inserto
     * un registro en el sistema.
     * @return devuelve el tiempo transcurrido entre las dos fechas (actual, fecha_registro)
     */
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

        if (!$full) {
            $string = array_slice($string, 0, 1);
        }
        return $string ? ' hace ' . implode(', ', $string) : 'justo ahora';
    }

    /**
     * Método que cambia la fecha a formato mysql
     * @param type $datetime fecha
     * @return fecha
     */
    public function cambiaFmysql($datetime) {
        $fechaSql = date("Y-m-d ", strtotime($datetime));
        //$fechaSql =  date("d/m/Y h:i:s", time());
        return $fechaSql;
    }
    /**
     * Método que cambia la fecha a formato normal dia/mes/año
     * @return fecha
     */
    public function getFechaNormal(){
         $fechaSql = date("d-m-Y", strtotime($this->datetime));
         return $fechaSql;
    }
    
    /**
     * Método que devuelve el tiempo transcurrido entre la fecha actual y la insertada en un registro.
     * @return fecha
     */
    public function getFecha(){
        return $this->time_elapsed_string($this->datetime);
    }
    /**
     * Método que da formato a la fecha
     * @return fecha
     */
    public function getFechaN(){
        $fechaN = date("d-m-Y", strtotime($this->datetime));
        return $fechaN;
    }
}
