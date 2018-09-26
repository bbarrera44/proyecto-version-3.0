<br>
<br>
<br>
<div class="container">
  <div class="form-group">
  <h2 ><b>Aprendices</b><br /></h2>
    <h5 class="fin" align="center">Dijie el numero de documento para ver los datos del aprendiz sena</h5>
  <hr color="#999999">
  </div>
  <br>
  <form action="../controladores/controlar.php?n=infnovedad" method="post">
    <div class="form-row">
      <h3><p>Numero de Documento</p></h3>
    </div>
  <div class="form-row">
    <input type="text" id="aprendiz" name="documento" class="form-control" placeholder="Numero de documento">
  </div>
  <br>
    <div class="form-row">
      <input type="submit" value="Consultar Aprendiz" class="btn btn-primary btn-lg btn-block" style="border-radius:12px;" align="center">
      <input type="button" value="Consultar Novedad" class="btn btn-primary btn-lg btn-block" style="border-radius:12px;" onclick="window.location.href='../controladores/controlar.php?n=connov'" >
    </div>
  </form>
  <br>
</div>
<br>
