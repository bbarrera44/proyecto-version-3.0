<?php

class Seguridad
{
  private $contrasena;

  function __construct($contrasena){
    $this->contrasena=$contrasena;
  }

  public function encriptarContrasena(){

  $con_encryp=password_hash($this->contrasena, PASSWORD_BCRYPT, array("cost" => 15));

  return $con_encryp;
  }
}

?>
