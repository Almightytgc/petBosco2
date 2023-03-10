<?php include("../../conexionBd.php"); 

if (isset($_GET['txtID'])) {

  $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

  /*codigo para hacer la consulta a la base de datos*/
  $sentencia = $conexion->prepare("SELECT * FROM reportemedico WHERE id_reporteMedico=:id_reporte");
  $sentencia->bindParam(":id_reporte",$txtID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);
  $chequeoGeneral = $registro['chequeogeneral'];
  $medicamento = $registro['medicamento'];
  $tratamiento = $registro['tratamiento'];
  $fechareporte = $registro['fechareporte'];
}



if($_POST) {

  /* recolectamos los datos */
  $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
  
  /* validamos si existe un dato para nombredelpuesto, de lo contrario va a quedar en blanco */
  $chequeoGeneral = (!empty($_POST['chequeogeneral'])) ? $_POST['chequeogeneral'] : null;
  $medicamento = (!empty($_POST['medicamento'])) ? $_POST['medicamento'] : null;
  $tratamiento = (!empty($_POST['tratamiento'])) ? $_POST['tratamiento'] : null;
  $fechareporte = (!empty($_POST['fechareporte'])) ? $_POST['fechareporte'] : null;

  /* preparamos la insercción o sentencia sql */
  $sentencia = $conexion->prepare("UPDATE reportemedico SET chequeogeneral=COALESCE(:chequeogeneral, chequeogeneral), medicamento=COALESCE(:medicamento, medicamento), tratamiento=COALESCE(:tratamiento, tratamiento), fechareporte=COALESCE(:fechareporte, fechareporte) WHERE id_reporteMedico=:id_reporteMedico");
  
  //asigando los valores que vienen del método post (que vienen del formulario)
  $sentencia->bindParam(":id_reporteMedico",$txtID);
  $sentencia->bindParam(":chequeogeneral",$chequeoGeneral);
  $sentencia->bindParam(":medicamento",$medicamento);
  $sentencia->bindParam(":tratamiento",$tratamiento);
  $sentencia->bindParam(":fechareporte",$fechareporte);

  $sentencia->execute();
  
  header("Location: index.php");
}
?>


<?php include("../../templates/headeruser.php");?>

<img src="../../logos/logo.png" alt="logo">

<div class="card m-auto text-center">
    <div class="card-header">
        Editar reporte médico
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="" class="form-label">ID</label>
          <input type="text"
          value = "<?php echo $txtID;?>"
            class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
        </div>

        <div class="mb-3">
              <label for="" class="form-label">Descripción del chequeo general</label>
              <input type="text"
              value = "<?php echo $chequeoGeneral;?>"
                class="form-control" name="chequeogeneral" id="chequeogeneral" aria-describedby="helpId" placeholder="Descripción">
          </div>


            <div class="mb-3">
              <label for="" class="form-label">Medicamento</label>
              <input type="text"
              value = "<?php echo $medicamento; ?>"
                class="form-control" name="medicamento" id="medicamento" aria-describedby="helpId" placeholder="Medicamento">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Tratamiento</label>
              <input type="text"
              value = "<?php echo $tratamiento; ?>"
                class="form-control" name="tratamiento" id="tratamiento" aria-describedby="helpId" placeholder="Tratamiento">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Fecha</label>
              <input type="date"
              value = "<?php echo $fechareporte; ?>"
                class="form-control" name="fechareporte" id="fechareporte" aria-describedby="helpId" placeholder="Fecha de reporte">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>                    
        </form>
    </div>

</div>
<?php include("../../templates/footer.php");?> 