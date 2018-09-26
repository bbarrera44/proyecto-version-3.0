<?php
session_start();
	require_once '../models/usuario.php';
	require_once '../models/aprendiz.php';
	require_once '../models/ficha.php';

	$registro=Aprendiz::consultarAprendiz($_SESSION['documento']);

	while ($reg=$registro->fetch(PDO::FETCH_ASSOC)){
	?>
<br>
<br>
<br>
<form action="../controladores/ac_aprendiz.php" method="post">
<div class="container">
	<div class="form_group">
		<h1>Informacion del aprendiz</h1>
			<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
		<hr width="80%" color="#ffffff">
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
				<h2>Primer Nombre:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['primer_nombre_aprendiz'];?>" name="primer_nombre_aprendiz">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Segundo Nombre:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['segundo_nombre_aprendiz'];?>" name="segundo_nombre_aprendiz">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
		<div class="form-group col-md-6">
				<h2>Primer Apellido:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['primer_apellido_aprendiz'];?>" name="primer_apellido_aprendiz">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Segundo Apellido:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['segundo_apellido_aprendiz'];?>" name="segundo_apellido_aprendiz">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Tipo de Documento:</h2>
					<center>
						<br />
						<div class="nom">
							<select name="tipo_documento">
								<option value="1" selected disabled>Tipo Documento</option>
							<?php  
									$fic=Usuario::tipoDocumento();
											
									while ($row=$fic->fetch(PDO::FETCH_ASSOC)) {

										echo "<option value='$row[id_tipo_documento]'>$row[tipo_documento]</option>";
									}
							?>
							</select>
						</div>
					</center>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Documento de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['documento']; ?>" name="documento">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Telefono(s) de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['tel_aprendiz'];?>" name="tel_aprendiz">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Celular del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><input type="text" value="<?php echo $reg['cel_aprendiz'];?>" name="cel_aprendiz">
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-group">
				<h2>Ficha:</h2>
					<center>
						<br />
						<div class="nom">						
							<select name="ficha">
								<option value="1" selected disabled>Ficha</option>
								<?php  
									$fic=Ficha::verFicha();
											
									while ($row=$fic->fetch(PDO::FETCH_ASSOC)) {

										echo "<option value='$row[id_ficha]'>$row[numero_ficha] - $row[nombre_programa]</option>";
									}
								?>
							</select>
						</div>
					</center>
				<hr width="80%" color="#ffffff">
			</div>
    </br>
		<input type="submit" value="Actualizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" />
	<br>
</div>
</form>
<br>
<?php } ?>