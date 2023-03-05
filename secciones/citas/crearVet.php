<?php include("../../conexionBd.php");

/*si se reciben datos por el metodo post*/
if ($_POST) {

  /*recolectamos los datos */
  
  /*validamos si existe un dato para los input, de lo contrario va a quedar en blanco */
  $motivo = isset($_POST['motivo']) ? $_POST["motivo"] : " ";
  $fecha = isset($_POST['fecha']) ? $_POST["fecha"] : " ";
  $hora = isset($_POST['hora']) ? $_POST["hora"] : " ";
  $fk_veterinario = isset($_POST['fk_veterinario']) ? $_POST["fk_veterinario"] : " ";
  $fk_mascota = isset($_POST['fk_mascota']) ? $_POST["fk_mascota"] : " ";
  


  /*preparamos la insercción o sentencia sql */
  $sentencia = $conexion->prepare("INSERT INTO cita(id_cita, motivo, fecha, hora) VALUES (null, :motivo, :fecha, :hora, :fk_veterinario, :fk_mascota)");

  //asigando los valores que vienen del método post (que vienen del formulario)
  $sentencia->bindParam(":motivo", $motivo);
  $sentencia->bindParam(":fecha", $fecha);
  $sentencia->bindParam(":hora", $hora);
  $sentencia->bindParam(":fk_veterinario", $fk_veterinario);
  $sentencia->bindParam(":fk_mascota", $fk_mascota);

  $sentencia->execute();

  header("Location: index.php");
}
?>

<?php include("../../templates/header.php"); ?>

<img src="../../logos/logo.png" alt="logo">

<div class="card m-auto text-center">
  <div class="card-header">
    <h5><b>Crear una cita</b></h5>
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Motivo</label>
        <input type="text" class="form-control" name="motivo" id="motivo" aria-describedby="helpId" placeholder="Motivo de cita">
      </div>


      <div class="mb-3">
        <label for="" class="form-label">Fecha</label>
        <input type="date" min="2023-03-01" max="2023-12-31" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha en que se agenda cita">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">hora</label>
        <input type="text" class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="hora de cita">
      </div>

      <div class="mb-3">
      <label for="" class="form-label">mascota</label>
        <select class="form-select" aria-label="veterinario">
        </select>
      </div>

      <div class="mb-3">
      <label for="" class="form-label">veterinario</label>
        <select class="form-select" aria-label="veterinario">
        </select>
      </div>
 



      <button type="submit" class="btn btn-success">Guardar</button>
      <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>
<?php include("../../templates/footer.php"); ?>