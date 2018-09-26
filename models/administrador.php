<?php
require_once 'conexion.php';
require 'usuario.php';

class Administrador extends Usuario{

    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $tipo_documento;
    public $documento;
    public $ficha;
    public $telefono;
    public $celular;

    public function consultarNovedad($documento){


    }

    public function ingresarNovedad($primer_nombre, $segundo_nombre,
                                    $primer_apellido, $segundo_apellido,
                                    $tipo_documento, $documento, $ficha,
                                    $telefono, $celular){


    }

    public function consultarFicha($ficha){


    }

    public function ingresarFicha($ficha){


    }

    public function getUsuarioAdministrador($documento){

      $con=Conexion::conectar('localhost','proyecto','root','');
      $doc=$con->prepare("SELECT * from usuario WHERE documento=:documento");
      $doc->execute(array(':documento' => $documento));

      return $doc;
    }

    public function modificarRol($documento){


    }

    public function modificarNovedad($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $ficha,
                                     $telefono, $celular){


    }
}

?>
