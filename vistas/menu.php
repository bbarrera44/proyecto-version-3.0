<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/estilomenu.css">
<?php if (empty($_COOKIE['usuario'])): ?>
	<link rel="stylesheet" href="css/modal_login.css">
<?php endif; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; z-index:10; width: 100%">
	<div class="logo">
		 <a href="../index.php"><img class="navbar-brand" src="img/logo.png" title="SABAJ"></a>
	</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
			ob_start();
			require_once '../models/conexion.php';

			if(isset($_COOKIE['usuario'])){
					echo "<li class=\"nav-item active\"><a href=\"../controladores/controlar.php?n=usuario\" class=\"nav-link\">".$_COOKIE['usuario']."</a></li>";
					echo "<li><a href=\"../index.php\" class=\"nav-link\">Inicio</a></li>";
				}else{
					echo "<li class=\"nav-item active\"><a href=\"../index.php\" class=\"nav-link\">Inicio</a></li>";
			}

			if(isset($_COOKIE['usuario'])){

				$cxn=Conexion::conectar('localhost','proyecto','root','');
				$car=$cxn->query("SELECT id_cargo FROM usuario");

				if ($row=$car->fetch(PDO::FETCH_ASSOC)) {

				if (($row['id_cargo']==1) or ($row['id_cargo']==2)) {

					echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Novedades</a>";
						echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=con\" >Aprendices</a>";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=d\">Registrar Novedad</a>";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=d\">Consultar Novedad</a>";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=fi\">Fichas</a>";
						echo "</div>";
					echo "</li>";

					}
			}else{

					echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Novedades</a>";
						echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=con\" >Aprendices</a>";
						echo "</div>";
					echo "</li>";
				}
			}
			?>
      </ul>
    <form class="form-inline my-2 my-lg-0">
			<?php if (isset($_COOKIE['usuario'])): ?>
				<a class="btn btn-danger" href="cerrarsesion.php" role="button">Cerrar Session</a>
			<?php else: ?>
				<table>
					<tr>
						<td><a class="btn btn-danger" role="button" onclick="document.getElementById('id01').style.display='block'" style="color: white;">Iniciar session</a></td>
						<td><a href="registro.php" class="btn btn-danger" role="button">Crear cuenta</a></td>
					</tr>
				</table>
			<?php endif; ?>
    </form>
  </div>
</nav>
<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->

  <form class="modal-content animate" action="../controladores/logiin.php" style="width: 40%" method="post">
    <div class="imgcontainer">
      <img src="img/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nombre de Usuario</b></label>
      <input type="text" placeholder="Nombre de Usuario" name="i_usuario" required>

      <label for="psw"><b>Contraseña</b></label>
      <input type="password" placeholder="Contraseña" name="i_contrasena" required>

      <input type="submit" value="Iniciar Sesion">
				<?php if (isset($_COOKIE["mal_login"])): ?>
					<div class="alert alert-danger" role="alert" style="width: 100%;">
						<?php
							echo $_COOKIE["mal_login"];
							setcookie("mal_login","",time()-1000,"/");
						?>
					</div>
				<?php endif; ?>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
      <span class="psw"><a href="recuperarcontrasena.php">¿Olvido su contraseña?</a></span>
    </div>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
