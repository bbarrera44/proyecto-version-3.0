<?php
require_once 'aprendiz.php';
require_once 'conexion.php';

class Ficha extends Aprendiz
{

  public $ficha;
  public $programa_formacion;

  public function ingresarFicha($ficha,$programa_formacion){


  }

  public function consultarFicha($ficha){

    
  }

  public function verFicha(){

  	$fic=Conexion::conectar('localhost','proyecto','root','');
  	$ficha=$fic->prepare("SELECT * FROM ficha INNER JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa");
  	$ficha->execute();

  	return $ficha;
  }
}

?>
