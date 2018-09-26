<?php

require_once 'conexion.php';

class Aprendiz{

    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $tipo_documento;
    public $documento;
    public $telefono;
    public $celular;
    public $ficha;

    public function ingresarAprendiz($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $telefono,
                                     $celular, $ficha){


    }

    public function modificarAprendiz($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $telefono,
                                     $celular, $ficha){

      $con=Conexion::conectar('localhost','proyecto','root','');

      $upd=$con->prepare("UPDATE aprendiz SET primer_nombre_aprendiz=:primer_nombre, segundo_nombre_aprendiz=:segundo_nombre, primer_apellido_aprendiz=:primer_apellido, segundo_apellido_aprendiz=:segundo_apellido, id_tipo_documento=:tipo_documento, documento=:documento, tel_aprendiz=:telefono, cel_aprendiz=:celular, id_ficha=:ficha WHERE documento=:ses_documento");

      $upd->execute(array(':primer_nombre' => $primer_nombre, ':segundo_nombre' => $segundo_nombre, ':primer_apellido' => $primer_apellido, ':segundo_apellido' => $segundo_apellido, ':tipo_documento' => $tipo_documento, ':documento' => $documento, ':telefono' => $telefono, ':celular' => $celular, ':ficha' => $ficha, ':ses_documento' => $_SESSION['documento']));


    }

    public function consultarAprendiz($documento){

      $conA=Conexion::conectar('localhost','proyecto','root','');

      $ap=$conA->prepare("SELECT * FROM aprendiz INNER JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha
                                                 INNER JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                                 WHERE aprendiz.documento=:documento");
      $ap->execute(array(':documento' => $documento ));

      return $ap;

    }

    public function estadoAprendiz($documento){

      $con=Conexion::conectar('localhost','proyecto','root','');

      $esA=$con->prepare("SELECT id_aprendiz,documento FROM aprendiz INNER JOIN novedad ON aprendiz.id_aprendiz=novedad.id_aprendiz
                                                                     INNER JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad
                                                                     WHERE aprendiz.documento=:documento");
      $esA->execute(array(':documento' => $documento ));

      if ($row=$esA->fetch(PDO::FETCH_ASSOC)) {
        $that=$row['tipo_novedad'];
      }else {
        $that="En formacion";
      }

      return $that;
    }
}
?>
