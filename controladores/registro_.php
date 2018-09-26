
<?php
//require '../models/security.php';
require '../models/usuario.php';

$reg=new Usuario();
$reg->registrarUsuario(filter_var($_POST['n_usuario'], FILTER_SANITIZE_STRING),$_POST['cargo'],$_POST['tipo_documento'],$_POST['n_documento'],
                       $_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['primer_apellido'],
                       $_POST['segundo_apellido'],$_POST['correo'],$_POST['telefono'],$_POST['celular'],
                       $_POST['con1'],$_POST['direccion'],$_POST['genero']);


?>
