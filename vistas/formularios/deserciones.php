<div class="form-area" style="height: 1100px; top:70%;">
  <h2 class="formulario__titulo" style="color:#FFF;">
    <b>Deserciones</b>
      <br />
        <h5 class="fin">Por favor llene las casillas con los datos del aprendiz para realizar la desercion.</h5></h2>
      <hr color="#999999">
    <br />
  <br />
<br />

<form action="../controladores/desercion_.php" method="post">
  <p>Ficha de Caracterizacion</p>
<input type="text" name="ficha" onkeypress="return justNumbers(event);" placeholder="Ficha" required>
  <p>Nombres</p>
<input type="text" name="nombres" placeholder="Nombres" required>
  <p>Apellidos</p>
<input type="text" name="apellidos" placeholder="Apellidos" required>
              <p>Tipo de documento</p>
                <select name="tipo_documento">
                  <option value="Seleccionar" selected="selected">Seleccionar</option>
                  <option value="C.C">Cedula de ciudadania</option>
                  <option value="T.I">Tarjeta de identidad</option>
                  <option value="C.E">Cedula de extranjeria</option>
                  <option value="Pasaporte">Pasaporte</option>
                  <option value="D.N.I">Documento nacional de identificacion </option>
                </select>
                  <hr color="#FFFFFF">
                    <p>Numero de Documento</p>
                      <input type="text" name="documento" onkeypress="return justNumbers(event);" placeholder="Numero de documento" required>
                        <p>Fecha Solicitud</p>
                          <input type="text" name="" placeholder="AAAAMMDD" onkeypress="return justNumbers(event);" value="<?php echo date("d-M-Y");?>" required><input type="hidden" name="fecha_desercion" placeholder="AAAAMMDD" value="<?php echo date("Ymd");?>" required>
                        <p>Motivo Solicitud</p>
                    <br />
                  <textarea name="solicitud" placeholder="Motivo" required></textarea>
                    <p>Descripcion</p>
                    <br />
                  <textarea name="descripcion"></textarea>
                <br />
              <br />
            <br />
            
  <input type="reset" value="Atras" class="submit" formaction="javascript:window.history.back();">
  <input type="reset" value="Limpiar" onclick="location.reload()">
  <input type="submit" value="Finalizar">
  

</form>

</div>