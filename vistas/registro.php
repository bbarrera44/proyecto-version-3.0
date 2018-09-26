<?php
	//require '../models/security.php';
	require_once '../models/conexion.php';
//	Security::permisosdispersos();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/logo.png" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="css/cl.css">
<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<script type="text/javascript">
function validarCon(){
	var p1 = document.getElementById("pass1").value;
	var p2 = document.getElementById("pass2").value;
	var cor1 = document.getElementById("cor1").value;
	var cor2 = document.getElementById("cor2").value;

	if (p1 != p2) {

  	alert("El correo o la contraseña no coinciden, Por favor intentelo de nuevo.");
		return false;
	} else {
  	return true;
	}

	if (cor1 != cor2) {

		alert("El correo o la contraseña no coinciden, Por favor intentelo de nuevo.");
		return false;
	} else {
		return true;
	}
}
</script>
</head>
<body>
<?php include('menu.php');?>
<form action="../controladores/registro_.php" class="formulario" method="post" onSubmit="return validarCon()" >

<h1 class="formulario__titulo"><b style="color:#000";>Datos de identificacion</b></h1>
<h4 class="formulario__titulo" style="color:#000;">Bienvenido, aqui podras registrarte en nuestro programa.</h4>
<?php
if(isset($_COOKIE['apren_exist'])){
	echo "<center><p style='color: red;'>".$_COOKIE['apren_exist']."</p></center>";
	setcookie("apren_exist","",time()-1000,"/");
}
if(isset($_COOKIE['us_inco'])){
	echo "<center><p style='color: red;'>".$_COOKIE['us_inco']."</p></center>";
	setcookie("us_inco","",time()-1000,"/");
}
?>
<hr></hr>
<br />
<label for="n_usuario" class="formulario__label">Nombre de usuario</label>
	<input type="text" class="formulario__input" name="n_usuario" required>

<label for="cargo" class="formulario__label">Cargo</label>
	<select  name="cargo" class="formulario__iinput">
		<option value="Cargo" selected="selected" disabled>Cargo</option>

		<?php
			$cxn=Conexion::conectar('localhost','proyecto','root','');

			$reg=$cxn->query("SELECT id_cargo FROM usuario WHERE id_cargo=1");

			$car=$cxn->query("SELECT * FROM cargo");

			if(!$reg->fetch(PDO::FETCH_ASSOC)) {
						while ($row=$car->fetch(PDO::FETCH_ASSOC)) {
									echo "<option value=\"$row[id_cargo]\">$row[cargo]</option>";
						}
			}
			else{
					while ($row=$car->fetch(PDO::FETCH_ASSOC)) {
								if ($row['id_cargo']!=1) {
										echo "<option value=\"$row[id_cargo]\">$row[cargo]</option>";
								}
				}
		}
		?>
</select>

<label for="primer_nombre" class="formulario__label">Primer Nombre</label>
	<input type="text" class="formulario__input" name="primer_nombre" required>

<label for="segundo_nombre" class="formulario__label">Segundo Nombre</label>
	<input type="text" class="formulario__input" name="segundo_nombre" required>

<label for="primer_apellido" class="formulario__label">Primer Apellido</label>
	<input type="text" class="formulario__input" name="primer_apellido" required>

<label for="segundo_apellido" class="formulario__label">Segundo Apellido</label>
	<input type="text" class="formulario__input" name="segundo_apellido" required>

<label for="segundo_apellido" class="formulario__label">Tipo de Documento</label>
	<select  name="tipo_documento" class="formulario__iinput">
  		<option value="tipo_documento" selected="selected" disabled>Tipo de Documento</option>
				<?php
					$tip=$cxn->query("SELECT * FROM tipo_documento");
					while ($has=$tip->fetch(PDO::FETCH_ASSOC)) {
						echo "<option value=\"$has[id_tipo_documento]\">$has[tipo_documento]</option>";
					}
				?>
 		</select>

<label for="n_documento" class="formulario__label">No. de documento</label>
	<input type="text" class="formulario__input" name="n_documento" onkeypress="return justNumbers(event);" required>

<label for="con1" class="formulario__label">Contraseña</label>
	<input type="password" class="formulario__input" name="con1" id="pass1" required>

<label for="con2" class="formulario__label">Confirmar contraseña</label>
	<input type="password" class="formulario__input" name="con2" id="pass2" required>

<label for="Direccion" class="formulario__label">Direccion</label>
	<input type="text" class="formulario__input" name="direccion" required>

<label for="genero" class="formulario__label">Genero</label>
	<select name="genero" class="formulario__iinput">
			<option value="genero" selected="selected" disabled>Genero</option>
				<?php
				$gnn=$cxn->query("SELECT * FROM genero");
				while ($gen=$gnn->fetch(PDO::FETCH_ASSOC)) {
					echo "<option value=\"$gen[id_genero]\">$gen[genero]</option>";
				}
				?>
		</select>

<?php if(isset($_COOKIE['correo_in'])){
			echo "<center><p style='color: red;'>".$_COOKIE['correo_in']."</p></center>";
			setcookie("correo_in","",time()-1000,"/");}
?>

<label for="correo" class="formulario__label">Correo electronico</label>
	<input type="text" class="formulario__input" name="correo" quired>

<label for="cocorreo" class="formulario__label">Confirmar correo</label>
	<input type="text" autocomplete="off" class="formulario__input" name="cocorreo" required>

<label for="telefono" class="formulario__label">Telefono</label>
	<input type="text" class="formulario__input" name="telefono" onkeypress="return justNumbers(event);" required>

<label for="celular" class="formulario__label">Celular</label>
	<input type="text" class="formulario__input" name="celular" onkeypress="return justNumbers(event);" required>

<input type="submit" value="Finalizar">


</form>

<!--<script src="form.js"></script>-->

</body>
</html>
