<?php include("../../../conexionBd.php"); 

if (isset($_GET['txtID'])) {

  $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

  /*codigo para hacer la consulta a la base de datos*/
  $sentencia = $conexion->prepare("SELECT * FROM cita WHERE id_cita=:id_cita");
  $sentencia->bindParam(":id_cita",$txtID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);
  $fechacita = $registro['fechacita'];

}



//actualizar
if($_POST) {

  /* recolectamos los datos */
  $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
  /* validamos si existe un dato para nombredelpuesto, de lo contrario va a quedar en blanco */
  $fechacita = (isset($_POST['fechacita']))?$_POST["fechacita"]:"";


  
  
  /* preparamos la insercción o sentencia sql */
  $sentencia = $conexion->prepare("UPDATE cita SET fecha=:fechacita WHERE id_cita=:id_cita");
  
  //asigando los valores que vienen del método post (que vienen del formulario)
  $sentencia->bindParam(":id_cita",$txtID);
  $sentencia->bindParam(":fechacita",$fechacita);

  $sentencia->execute();
  
  
      header("Location: index.php");
  }

?>


<?php include("../../../templates/headeruser.php");?>

<img src="../../../logos/logo.png" alt="logo">

<div class="card m-auto text-center">
    <div class="card-header">
        Editar reporte médico
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <input type="hidden"
          value = "<?php echo $txtID;?>"
            class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
        </div>

            <div class="mb-3">
              <label for="" class="form-label">Fecha de la cita</label>
              <input type="date"
              value = "<?php echo $fechacita; ?>"
                class="form-control" name="fechacita" id="fechareporte" aria-describedby="helpId" placeholder="Fecha de reporte">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>                    
        </form>
    </div>

</div>
<?php include("../../../templates/footer.php");?> 