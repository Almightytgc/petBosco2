<?php include("../../../conexionBd.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM citaveterinario");
$sentencia->execute();
$lista_reportes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//actualizar
if($_POST) {

  /* recolectamos los datos */
  $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
  /* validamos si existe un dato para nombredelpuesto, de lo contrario va a quedar en blanco */
  $motivo = (isset($_POST['motivo']))?$_POST["motivo"]:"";
  $fecha = (isset($_POST['fecha']))?$_POST["fecha"]:"";
  $hora = (isset($_POST['hora']))?$_POST["hora"]:"";

  
  
  /* preparamos la insercción o sentencia sql */
  $sentencia = $conexion->prepare("UPDATE citaveterinario SET motivo=:motivo, fecha=:fecha, hora=:hora, WHERE id_cita=:id_cita");
  
  //asigando los valores que vienen del método post (que vienen del formulario)
  $sentencia->bindParam(":motivo",$motivo);
  $sentencia->bindParam(":fecha",$fecha);
  $sentencia->bindParam(":hora",$hora);
  $sentencia->execute();
  
  
      header("Location: index.php");
  }

?>


<?php include("../../../templates/header.php");?>

<img src="../../../logos/logo.png" alt="logo">

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
              value = "<?php echo $motivo;?>"
                class="form-control" name="motivo" id="motivo" aria-describedby="helpId" placeholder="Nombre del puesto">
          </div>


            <div class="mb-3">
              <label for="" class="form-label">fecha</label>
              <input type="text"
              value = "<?php echo $fecha?>"
                class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Nombre del puesto">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">hora</label>
              <input type="text"
              value = "<?php echo $hora?>"
                class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="Nombre del puesto">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>                    
        </form>
    </div>

</div>
<?php include("../../../templates/footer.php");?> 