<?php 
class Index{
	
	public function __construct(){

	}

	public function ContarServiciosSolicitados() {
			$db = new dbConn();

			$a = $db->query("SELECT * FROM contratos WHERE estado = '1'");
			return $a->num_rows;
            $a->close();
	}

		public function Contarcobros() {
			$db = new dbConn();

			$a = $db->query("SELECT * FROM control_facturas WHERE estado = '1'");
			return $a->num_rows;
            $a->close();
	}







}

?>