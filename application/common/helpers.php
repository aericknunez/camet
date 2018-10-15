<?php
class Helpers{

    public function __construct(){

    } 

    function Telefono($numero) {
        $numero=str_replace("-","",$numero);

        $num1 = substr($numero, 0, 4);  
        $num2 = substr($numero, 4, 8);  
       return $num1."-".$num2; 
    }

    function Dui($numero) {
        $numero=str_replace("-","",$numero);

        $num1 = substr($numero, 0, 8);  
        $num2 = substr($numero, 8, 9);  
        return $num1."-".$num2; 
    }

     function ComprobarDui($numero) {
        $db = new dbConn();
        $numero=$this->Dui($numero);
        $a = $db->query("SELECT dui FROM clientes WHERE dui = '$numero'");
        if($a->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        $a->close();
     }

       
    public function Mayusculas($nombre){
        return ucwords(strtolower($nombre));
    }

    public function MayusInicial($nombre){
    return ucfirst(strtolower($nombre));
    }


    
    public function primerapalabra($nombre){
        $parte = explode(" ",$nombre); 
        return $parte[0];
    }  
    
    public function segundapalabra($nombre){
        $parte = explode(" ",$nombre); 
        return $parte[1];
    }

    public function tercerapalabra($nombre){
        $parte = explode(" ",$nombre); 
        return $parte[2];
    }

    public function format($numero){  
        $format=number_format($numero,2,'.','.');
        return $format;
     } 


     public function formatFecha($fecha){  
        $format=strtotime($fecha);
        return $format;
     }

     public function fecha($fecha)
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
