<?php
	include ('menu.php');
	require_once '../models/conexion.php';
//require_once '../includes/security.php';
//require_once '../controladores/consultar.php';
//require_once '../includes/DB.php';

//Security::permisos();

if(isset($_GET['aprendices'])) $dato=$_GET['aprendices'];
if(isset($_GET['usuario'])) $dato=$_GET['usuario'];

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/logo.png" />
	<title>SABAJ</title>
<link rel="stylesheet" type="text/css" href="css/css_usuario.css">
<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
</head>
<body>

<?php
	include ("formularios/".$dato.".php");
	include ("pie.php");
?>
</body>
</html>
