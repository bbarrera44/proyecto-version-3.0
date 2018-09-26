<?php
session_start();
//require_once '../models/security.php';
require_once '../models/aprendiz.php';

//Security::permisos();

Aprendiz::modificarAprendiz($_POST['primer_nombre_aprendiz'],$_POST['segundo_nombre_aprendiz'],$_POST['primer_apellido_aprendiz'],$_POST['segundo_apellido_aprendiz'],$_POST['tipo_documento'],$_POST['documento'],$_POST['tel_aprendiz'],$_POST['cel_aprendiz'],$_POST['ficha']);



header("Location: controlar.php?n=completado");
?>