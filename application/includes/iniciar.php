<? 
include_once 'variables_db.php';
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();

$user=sha1($_SESSION['username']);


	function UserInicio($user,$mysqli)
	{
		if ($stmt = $mysqli->prepare("SELECT nombre, tipo, tkn, avatar, td 
				  FROM login_userdata 
                  WHERE user = ? LIMIT 1")) {
        $stmt->bind_param('s', $user);  // Bind  to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($nombre, $tipo, $tkn, $avatar, $td);
        $stmt->fetch();
        $stmt->close();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['tkn'] = $tkn;
        $_SESSION['avatar'] = $avatar;
        $_SESSION['user'] = $user;
        $_SESSION['td'] = $td;
        $_SESSION['tx'] = 1;

        include("../common/mysqli.php");
        }

        header("location: ../../index.php");
  	}


UserInicio($user,$mysqli);

?>