<?php
session_start();
	require '../models/aprendiz.php';

	$registro=Aprendiz::consultarAprendiz($_SESSION['documento']);

	if ($reg=$registro->fetch(PDO::FETCH_ASSOC)){
	?>
<br>
<br>
<br>
<div class="container">
	<div class="form_group">
		<h1>Informacion del aprendiz</h1>
			<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
		<hr width="80%" color="#ffffff">
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
				<h2>Nombres del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['primer_nombre_aprendiz']."".$reg['segundo_nombre_aprendiz'];  ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Apellidos del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['primer_apellido_aprendiz']."".$reg['segundo_apellido_aprendiz'];  ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Documento de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['documento'];  ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Telefono(s) de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['tel_aprendiz'];?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Celular del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['cel_aprendiz']; ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Ficha:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['numero_ficha']; ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Programa de formacion:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['nombre_programa'];?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Estado del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php $es=Aprendiz::estadoAprendiz($_SESSION['documento']); echo $es;?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
    </br>
		<input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='javascript:window.history.back();'"/>
		<input type="button" value="Modificar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='../controladores/controlar.php?n=mod_aprendiz'"/>
	<br>
</div>
<br>
<?php
}else{
?>
<br>
<br>
<br>
	<div class="container">
		<div class="form_group">
        <h1>Informacion del aprendiz</h1>
					<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
				<hr width="80%" color="#FFFFFF" ><br /><br />
		<h2>El aprendiz no se encuentra registrado en la base de datos<center><br />
</div>
        <input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='consultar.php?aprendices=aprendices'"/>
		<input type="button" value="Finalizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='index.php'"/>
		<br>
	</div>
	<br>
<?php
}
?>
