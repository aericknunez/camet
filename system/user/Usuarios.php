<?php 
class Usuarios{
	public $password;
	public $pass1;
	public $pass2;


	public function CambiarPass($password) {
			$db = new dbConn();

			$password = hash('sha512', $password);

			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        	$password = hash('sha512', $password . $random_salt);

        	if (strlen($password) == 128) {
	        	$cambio = array();
			    $cambio["password"] = $password;
			    $cambio["salt"] = $random_salt;
			    if ($db->update("login_members", $cambio, "WHERE username = '".$_SESSION["username"]."'")) {

			    	echo "Password cambiado!!";
			    }
			    else {
			    	echo "Error! no se ha podido cambiar";
			    }
        	}
        	else{
        		echo "Error desconocido";
        	}


	}

	public function CompararPass($pass1, $pass2) {
		if($pass1 == $pass2){
			if(strlen($pass1) > 6){
				if($this->MayusCount($pass1) > 0) {
					if($this->NumCount($pass1) > 0) {
						$this->CambiarPass($pass1);
					} else { echo "Debe contener al menos un numero"; } 
					
				} else {
					echo "Debe tener al manos una Mayuscula";
				}

				
			}
			else { 
				echo "El password debe tener mas de 6 Caracteres";
			}
			
		} else {
			echo "Los password no son iguales";
		}

	}

	function MayusCount($string){
	    $string = preg_match_all('/([A-Z]{1})/',$string,$foo);
	    return $string;
	}


	function NumCount($string){
	    $string = preg_match_all('/([0-9]{1})/',$string,$foo);
	    return $string;
	}



	public function EliminarUsuario($iden, $username) {
			$db = new dbConn();
			
			if ( $db->delete("login_members", "WHERE id='$iden'")) {
        	
        		if ( $db->delete("login_userdata", "WHERE user='$username'")) {
	        	$alert = new Alerts;
	        	$alert->UsuarioEliminado();
	    		} 
    		} 
	}

}