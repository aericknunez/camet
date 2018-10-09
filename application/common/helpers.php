<?php
class Helpers
{
    public static function format($numero)
    {  
        $format=number_format($numero,2,'.','.');
        return $format;
     } 


     public static function formatFecha($fecha)
    {  
        $format=strtotime($fecha);
        return $format;
     }

     public static function fecha($fecha)
    {  
        $dia=substr($fecha,0,2);
        $mes=substr($fecha,3,2);
        $anio=substr($fecha,6,4);
      
        switch ($mes){
            case '01':
            $mes="Enero";
            break;
            case '02':
            $mes="Febrero";
            break;
            case '03':
            $mes="Marzo";
            break;
            case '04':
            $mes="Abril";
            break;
            case '05':
            $mes="Mayo";
            break;
            case '06':
            $mes="Junio";
            break;
            case '07':
            $mes="Julio";
            break;
            case '08':
            $mes="Agosto";
            break;
            case '09':
            $mes="Septiembre";
            break;
            case '10':
            $mes="Octubre";
            break;
            case '11':
            $mes="Noviembre";
            break;
            case '12':
            $mes="Diciembre";
            break;
        }
        $fecha=$dia." de ".$mes." de ".$anio;
        return $fecha; 
    }
}