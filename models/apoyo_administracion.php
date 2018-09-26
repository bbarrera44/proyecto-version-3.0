<?php
require 'usuario.php';

class Apoyo_administracion extends Usuario{

    $primer_nombre;
    $segundo_nombre;
    $primer_apellido;
    $segundo_apellido;
    $tipo_documento;
    $documento;
    $ficha;
    $telefono;
    $celular;

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

    public function modificarNovedad($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $ficha,
                                     $telefono, $celular){


    }
}

?>
