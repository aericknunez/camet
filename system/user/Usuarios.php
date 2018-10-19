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

			    	Alerts::Alerta("success","Password Cambiado","Pasword cambiado correctamente!");
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
	        	
	        	$this->VerUsuarios();
	     	Alerts::Alerta("success","Usuario Eliminado","Usuario eliminado correctamente!");
	    		} 
    		} 
	}


	public function VerUsuarios(){
	$db = new dbConn();
	echo '<table class="table table-striped table-responsive-md btn-table table-sm">
   <thead>
     <tr>
       <th>Nombre</th>
       <th>Email</th>
       <th>Cuenta</th>
       <th>Eliminar</th>
     </tr>
   </thead>

   <tbody>';
//busqueda de usuarios
$a = $db->query("select id, username, email from login_members WHERE id != 1");
    foreach ($a as $b) {
$user=sha1($b["username"]);
if ($r = $db->select("nombre, tipo", "login_userdata", "where user = '$user'")) { 
	if($r["tipo"] == "1") $tipo = "Super Admin";
	if($r["tipo"] == "2") $tipo = "Administrador";
	if($r["tipo"] == "3") $tipo = "Usuario";
	echo '<tr>
       <td>'. $r["nombre"] . '</td>
       <td>'. $b["email"] . '</td>
       <td>'. $tipo . '</td>
       
       <td><a id="deluser" op="2" iden="'.$b["id"].'" username="'.$user.'" class="btn-floating btn-sm"><i class="fa fa-trash red-text"></i></a></td>
     </tr>';

    } 
    unset($r);    
    }
   $a->close();

   echo '</tbody>
	</table>';
   


	}

}