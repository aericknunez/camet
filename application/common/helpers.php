<?php
class Helpers{

    public function __construct(){

    } 

    function EstadoContrato($string) {
    if($string == "1") return '<small class="text-success font-weight-bold">Solicitado</small>';
    if($string == "2") return '<small class="text-primary font-weight-bold">Activo</small>';
    if($string == "3") return '<small class="text-warning font-weight-bold">Suspendido</small>';
    if($string == "4") return '<small class="text-danger font-weight-bold">Cancelado</small>';
    if($string == "5") return '<small class="text-info font-weight-bold">Pausado</small>';
    }

    function TipoServicio($string) {
        if($string == "1") return "Servicio de cable por television";
        if($string == "2") return "Servicio de Internet";
    }

    function Telefono($numero) {
        if($numero == NULL){
          return NULL;  
        } else{
        $numero=str_replace("-","",$numero);

        $num1 = substr($numero, 0, 4);  
        $num2 = substr($numero, 4, 8);  
       return $num1."-".$num2; 
        }
    }

    function Dui($numero) {
        if($numero == NULL){
          return NULL;  
        } else{
        $numero=str_replace("-","",$numero);

        $num1 = substr($numero, 0, 8);  
        $num2 = substr($numero, 8, 9);  
        return $num1."-".$num2;
        } 
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


    
}
