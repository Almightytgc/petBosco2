<?php include("../../conexionBd.php"); 

/*si se reciben datos por el metodo post*/ 
if($_POST) {

    /*recolectamos los datos */
    /*validamos si existe un dato para los input, de lo contrario va a quedar en blanco */
    $nombres = (isset($_POST['nombres']) ? $_POST["nombres"]:"");
    $apellidos = (isset($_POST['apellidos']) ? $_POST["apellidos"]:"");
    $fechaNacimiento = (isset($_POST['fechaNacimiento']) ? $_POST["fechaNacimiento"]:"");
    $num_telefonico = (isset($_POST['num_telefonico']) ? $_POST["num_telefonico"]:"");
    $direccion = (isset($_POST['direccion']) ? $_POST["direccion"]:"");
    $dui = (isset($_POST['dui']) ? $_POST["dui"]:"");
    $contrasenia = (isset($_POST['contrasenia']) ? $_POST["contrasenia"]:"");


    /*preparamos la insercción o sentencia sql */
    $sentencia = $conexion->prepare("INSERT INTO cliente(id_cliente, nombre, apellido, fechaNac, num_telefonico, direccion, DUI, contraseña) VALUES (null, :nombres, :apellidos, :fechaNac, :num_telefonico, :direccion, :dui, :contrasenia)");

    //asigando los valores que vienen del método post (que vienen del formulario)
    $sentencia->bindParam(":nombres",$nombres);
    $sentencia->bindParam(":apellidos",$apellidos);
    $sentencia->bindParam(":fechaNac",$fechaNacimiento);
    $sentencia->bindParam(":num_telefonico",$num_telefonico);
    $sentencia->bindParam(":direccion",$direccion);
    $sentencia->bindParam(":dui",$dui);
    $sentencia->bindParam(":contrasenia",$contrasenia);


    $sentencia->execute();

    header("Location: registroMascota.php");
}
?>

<?php include("../../templates/header.php");?>



<img src="../../logos/logo.png" alt="logo" width="800">

<div class="card m-auto text-center">
    <div class="card-header">
        <h14><b>Crear reporte médico</b></h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="" class="form-label">Nombres</label>
              <input type="text"
                class="form-control" name="nombres" id="chequeogeneral" aria-describedby="helpId" placeholder="Nombres">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Apellidos</label>
              <input type="text"
                class="form-control" name="apellidos" id="medicamento" aria-describedby="helpId" placeholder="Apellidos">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Fecha de nacimiento</label>
              <input type="date"
                class="form-control" name="fechaNac" id="tratamiento" aria-describedby="helpId" placeholder="Fecha de nacimiento">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Número telefónico</label>
              <input type="text"
              min="2023-01-01" max="2023-12-31" class="form-control" name="num_telefonico" id="fecha" aria-describedby="helpId" placeholder="Número telefónico">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Direccion</label>
              <input type="text"
                class="form-control" name="direccion" id="tratamiento" aria-describedby="helpId" placeholder="direccion">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">DUI</label>
              <input type="text"
                class="form-control" name="dui" id="tratamiento" aria-describedby="helpId" placeholder="Digite su DUI">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Contraseña</label>
              <input type="text"
                class="form-control" name="contrasenia" id="tratamiento" aria-describedby="helpId" placeholder="Digite una contraseña">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>
<?php include("../../templates/footer.php");?> 