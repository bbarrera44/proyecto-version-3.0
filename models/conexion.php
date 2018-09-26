<?php
class Conexion{

	public function conectar($host,$database,$user,$password){
		$cxn = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);

		return $cxn;
	}
}
?>
