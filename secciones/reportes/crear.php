<?php include("../../conexionBd.php"); 

/*si se reciben datos por el metodo post*/ 
if($_POST) {

    /*recolectamos los datos */
    /*validamos si existe un dato para los input, de lo contrario va a quedar en blanco */
    $chequeoGeneral = (isset($_POST['chequeogeneral']) ? $_POST["chequeogeneral"]:"");
    $medicamento = (isset($_POST['medicamento']) ? $_POST["medicamento"]:"");
    $tratamiento = (isset($_POST['tratamiento']) ? $_POST["tratamiento"]:"");
    $fechaReporte = (isset($_POST['fecha']) ? $_POST["fecha"]:"");


    /*preparamos la insercción o sentencia sql */
    $sentencia = $conexion->prepare("INSERT INTO reportemedico(id_reporte, chequeoGeneral, medicamento, tratamiento, fechaReporte) VALUES (null, :chequeogeneral, :medicamento, :tratamiento, :fecha)");

    //asigando los valores que vienen del método post (que vienen del formulario)
    $sentencia->bindParam(":chequeogeneral",$chequeoGeneral);
    $sentencia->bindParam(":medicamento",$medicamento);
    $sentencia->bindParam(":tratamiento",$tratamiento);
    $sentencia->bindParam(":fecha",$fechaReporte);

    $sentencia->execute();

    header("Location: index.php");
}
?>

<?php include("../../templates/header.php");?>



<img src="../../logos/logo.png" alt="logo">

<div class="card m-auto text-center">
    <div class="card-header">
        <h14><b>Crear reporte médico</b></h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="" class="form-label">Descripción del chequeo general</label>
              <input type="text"
                class="form-control" name="chequeogeneral" id="chequeogeneral" aria-describedby="helpId" placeholder="Descripción del chequeo">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Medicamento</label>
              <input type="text"
                class="form-control" name="medicamento" id="medicamento" aria-describedby="helpId" placeholder="Medicamento a consumir">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Tratamiento</label>
              <input type="text"
                class="form-control" name="tratamiento" id="tratamiento" aria-describedby="helpId" placeholder="Tratamiento a seguir">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Fecha</label>
              <input type="date"
              min="2023-01-01" max="2023-12-31" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha en que se realiza el reporte">
            </div>


            <button type="submit" class="btn btn-success">Guardar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>
<?php include("../../templates/footer.php");?> 