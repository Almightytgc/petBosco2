<?php include("../../conexionBd.php"); 

if (isset($_GET['txtID'])) {

  $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

  /*codigo para hacer la consulta a la base de datos*/
  $sentencia = $conexion->prepare("SELECT * FROM cliente WHERE id_cliente=:id_cliente");
  $sentencia->bindParam(":id_cliente",$txtID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);
  $num_telefonico = $registro['num_telefonico'];
  $direccion = $registro['direccion'];
  $usuario = $registro['usuario'];
  $contrasenia = $registro['contrasenia'];
}



//actualizar
if($_POST) {

  /* recolectamos los datos */
  $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
  /* validamos si existe un dato para nombredelpuesto, de lo contrario va a quedar en blanco */
  $num_telefonico = (isset($_POST['num_telefonico']))?$_POST["num_telefonico"]:"";
  $direccion = (isset($_POST['direccion']))?$_POST["direccion"]:"";
  $usuario = (isset($_POST['usuario']))?$_POST["usuario"]:"";
  $contrasenia = (isset($_POST['contrasenia']))?$_POST["contrasenia"]:"";

  
  
  /* preparamos la insercción o sentencia sql */
  $sentencia = $conexion->prepare("UPDATE cliente SET num_telefonico=:num_telefonico, direccion=:direccion, usuario=:usuario, contraseña=:contrasenia WHERE id_cliente=:id_cliente");
  
  //asigando los valores que vienen del método post (que vienen del formulario)
  $sentencia->bindParam(":id_cliente",$txtID);
  $sentencia->bindParam(":num_telefonico",$num_telefonico);
  $sentencia->bindParam(":direccion",$direccion);
  $sentencia->bindParam(":usuario",$usuario);
  $sentencia->bindParam(":contrasenia",$contrasenia);

  $sentencia->execute();
  
  
      header("Location: index.php");
  }

?>


<?php include("../../templates/headeruser.php");?>

<img src="../../logos/logo.png" alt="logo">

<div class="card m-auto text-center">
    <div class="card-header">
        <b>Editar datos del perfil</b>
        <div class="alert alert-primary" role="alert">
                    <strong>Por favor ingrese los datos a modificar</strong>
                </div>  
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="" class="form-label">ID</label>
          <input type="hidden"
          value = "<?php echo $txtID;?>"
            class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
        </div>

        <div class="mb-3">
              <label for="" class="form-label">Número telefónico</label>
              <input type="text"
              value = ""
                class="form-control" name="num_telefonico" id="num_telefonico" aria-describedby="helpId" placeholder="Número de teléfono">
          </div>


            <div class="mb-3">
              <label for="" class="form-label">Dirección</label>
              <input type="text"
              value = ""
                class="form-control" name="direccion" id="medicamento" aria-describedby="helpId" placeholder="Dirección">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Usuario</label>
              <input type="text"
              value = ""
                class="form-control" name="usuario" id="tratamiento" aria-describedby="helpId" placeholder="Usuario">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Contraseña</label>
              <input type="text"
              value = "<?php echo $contrasenia; ?>"
                class="form-control" name="contrasenia" id="fechareporte" aria-describedby="helpId" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>                    
        </form>
    </div>

</div>
<?php include("../../templates/footer.php");?> 