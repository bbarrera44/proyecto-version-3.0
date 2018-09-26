<?php

require 'aprendiz.php';

class Novedad extends Aprendiz{

  $tipo_novedad;
  $fecha_novedad;
  $primer_nombre;
  $segundo_nombre;
  $primer_apellido;
  $segundo_apellido;
  $ficha;
  $ficha_reingreso;
  $tipo_documento;
  $documento;
  $motivo;
  $descripcion;

  public function ingresarNovedad($tipo_novedad, $fecha_novedad,
                                  $primer_nombre, $segundo_nombre,
                                  $primer_apellido, $segundo_apellido,
                                  $ficha, $tipo_documento, $documento,
                                  $motivo, $descripcion, $ficha_reingreso="0"){


  }

  public function ingresarNovedad($tipo_novedad, $fecha_novedad,
                                  $primer_nombre, $segundo_nombre,
                                  $primer_apellido, $segundo_apellido,
                                  $ficha, $tipo_documento, $documento,
                                  $motivo, $descripcion){


  }

  public function consultarNovedad($documento){


  }

  public function modificarNovedad($documento){


  }
}
?>
