<?php

require_once 'conexion.php';
require_once 'seguridad.php';

class Usuario
  {
    public $nombre_usuario;
    public $cargo;
    public $tipo_documento;
    public $documento;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $correo;
    public $telefono;
    public $celular;
    public $contrasena;
    public $direccion;
    public $genero;

    public function registrarUsuario($nombre_usuario, $cargo, $tipo_documento, $documento,
                                     $primer_nombre, $segundo_nombre, $primer_apellido,
                                     $segundo_apellido, $correo, $telefono,
                                     $celular, $contrasena, $direccion, $genero){


          $cxn=Conexion::conectar('localhost','proyecto','root','');

          $sel=$cxn->prepare("SELECT documento FROM usuario WHERE documento=:documento");
          $sel->execute(array(':documento' => $documento ));

          if ($sel->fetch(PDO::FETCH_ASSOC)) {
            setcookie("us_inco","El usuario ya se encuentra registrado",time()+1000,"/");
            header("Location: ../vistas/registro.php");
          }else{

            $con=new Seguridad($contrasena);
            $con_encryp=$con->encriptarContrasena();


          $reg=$cxn->prepare("INSERT INTO usuario (id_usuario,nombre_usuario,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,id_tipo_documento,documento,id_cargo,correo,direccion,contrasena,cel_usuario,tel_usuario,id_genero)
                              VALUES (NULL,:nombre_usuario,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:id_tipo_documento,:documento,:cargo,:correo,:direccion,:contrasena,:telefono,:celular,:genero)");

          $reg->execute(array(':nombre_usuario' => $nombre_usuario,':primer_nombre' => $primer_nombre,':segundo_nombre' => $segundo_nombre, ':primer_apellido' => $primer_apellido,':segundo_apellido' => $segundo_apellido,':id_tipo_documento' => $tipo_documento,':documento' => $documento,':cargo' => $cargo,':correo' => $correo,':direccion' => $direccion,
                              ':contrasena' => $con_encryp,':telefono' => $telefono,':celular' => $celular,':genero' => $genero));

         if ($reg) {
                setcookie("correcto","",time()+1000*1000,"/");
                header("Location: ../vistas/registro__.php");
              } else {
                header("Location: ../vistas/registro__.php");
              }

          }
   }

   public function iniciarSesion($nombre_usuario,$contrasena){

     $cxn=Conexion::conectar('localhost','proyecto','root','');

     $ini=$cxn->prepare("SELECT nombre_usuario,documento,contrasena FROM usuario WHERE nombre_usuario=:nombre_usuario");
     $ini->execute(array(':nombre_usuario' => $nombre_usuario));

     if ($iniciar=$ini->fetch(PDO::FETCH_ASSOC)){
       if (password_verify($contrasena,$iniciar['contrasena'])) {
          setcookie("usuario",$nombre_usuario,time()+10000*10000,"/");
          header("Location: ../index.php");
       }else {
         setcookie("mal_login","Contraseña incorrecta.",time()+1000*1000,"/");
         header("Location: ../vistas/index.php");
       }

     }else {
       setcookie("mal_login","El usuario no existe, por favor verificar.",time()+1000*1000,"/");
       header("Location: ../vistas/index.php");
     }
   }

   public function modificarUsuario($nombre_usuario, $documento,
                                    $primer_nombre, $segundo_nombre, $primer_apellido,
                                    $segundo_apellido, $direccion, $correo, $telefono,
                                    $celular, $contrasena){

  $cxn=Conexion::conectar('localhost','proyecto','root','');

if ($contrasena!="") {

  $cn=new Seguridad($contrasena);
  $con_encryp=$cn->encriptarContrasena();

}else {
  $con=$cxn->prepare("SELECT contrasena FROM usuario WHERE nombre_usuario=:nom");
  $con->execute(array(':nom' => $_COOKIE['usuario']));
  while ($cont=$con->fetch(PDO::FETCH_ASSOC)) {
    $con_encryp=$cont['contrasena'];
  }
}

  $mod=$cxn->prepare("UPDATE usuario SET nombre_usuario=:nombre_usuario, documento=:documento,
                      primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre,
                      primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido,
                      direccion=:direccion, correo=:correo, tel_usuario=:telefono,
                      cel_usuario=:celular, contrasena=:contrasena WHERE nombre_usuario=:nom_usu");
  $mod->execute(array(':nombre_usuario' =>  $nombre_usuario,':documento' =>  $documento,':primer_nombre' =>  $primer_nombre,
                      ':segundo_nombre' =>  $segundo_nombre,':primer_apellido' =>  $primer_apellido,':segundo_apellido' =>  $segundo_apellido,
                      ':direccion' =>  $direccion,':correo' =>  $correo,':telefono' =>  $telefono,
                      ':celular' =>  $celular,':contrasena' =>  $con_encryp, ':nom_usu' => $_COOKIE['usuario']));

    setcookie("actualizar","Los datos se han actualizado correctamente.",time()+30,"/");

  }

  public function modificarUsuarioAdministrador($nombre_usuario, $cargo, $documento,
                                                $primer_nombre, $segundo_nombre, $primer_apellido,
                                                $segundo_apellido, $correo, $telefono,
                                                $celular,$direccion){

    $cxn=Conexion::conectar('localhost','proyecto','root','');

    $modad=$cxn->prepare("UPDATE usuario SET nombre_usuario=:nombre_usuario, documento=:documento,
                        primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre,
                        primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido,
                        direccion=:direccion, correo=:correo, tel_usuario=:telefono,
                        cel_usuario=:celular WHERE documento=:doc");
    $modad->execute(array(':nombre_usuario' =>  $nombre_usuario,':documento' =>  $documento,':primer_nombre' =>  $primer_nombre,
                        ':segundo_nombre' =>  $segundo_nombre,':primer_apellido' =>  $primer_apellido,':segundo_apellido' =>  $segundo_apellido,
                        ':direccion' =>  $direccion,':correo' =>  $correo,':telefono' =>  $telefono,
                        ':celular' =>  $celular,':doc' => $_SESSION['documento']));

    if ($modad) {
      setcookie("ac_admin","Los datos se actualizaron correctamente.",time()+30,"/");
    }else {
      setcookie("ac_admin_bad","Hubo un error, intente nuevamente.",time()+30,"/");
    }
  }

  public function tipoDocumento()
  {
    $cxn=Conexion::conectar('localhost','proyecto','root','');

    $tip=$cxn->prepare("SELECT * FROM tipo_documento");
    $tip->execute();

    return $tip;
  }
}
?>
