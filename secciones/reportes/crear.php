<?php include("../../conexionBd.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM cliente");
$sentencia->execute();
$lista_clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM mascota");
$sentencia->execute();
$lista_mascotas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

/*si se reciben datos por el metodo post*/ 
if($_POST) {
    /*recolectamos los datos */
    /*validamos si existe un dato para los input, de lo contrario va a quedar en blanco */
    $chequeoGeneral = (isset($_POST['chequeogeneral']) ? $_POST["chequeogeneral"]:"");
    $medicamento = (isset($_POST['medicamento']) ? $_POST["medicamento"]:"");
    $tratamiento = (isset($_POST['tratamiento']) ? $_POST["tratamiento"]:"");
    $fechaReporte = (isset($_POST['fecha']) ? $_POST["fecha"]:"");    
    $cliente = (intval($_POST['idcliente']) ? $_POST["idcliente"]:"");
    $mascota = (isset($_POST['idMascota']) ? $_POST["idMascota"]:"");

    /*preparamos la insercción o sentencia sql */
    $sentencia = $conexion->prepare("INSERT INTO reportemedico(id_reporteMedico, ChequeoGeneral, Medicamento, Tratamiento, fechaReporte, fk_cliente, fk_mascota) VALUES (null, :chequeogeneral, :medicamento, :tratamiento, :fecha, :idMascota, :fk_cliente)");

    //asigando los valores que vienen del método post (que vienen del formulario)
    $sentencia->bindParam(":chequeogeneral",$chequeoGeneral);
    $sentencia->bindParam(":medicamento",$medicamento);
    $sentencia->bindParam(":tratamiento",$tratamiento);
    $sentencia->bindParam(":fecha",$fechaReporte);
    //$sentencia->bindParam(":idcliente",$cliente);
    $sentencia->bindParam(":idMascota",$mascota);
    $sentencia->bindParam(":fk_cliente",$cliente);
    $sentencia->execute();

    header("Location: index.php");
}
?>

<?php include("../../templates/headeruser.php");?>



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
                class="form-control" required name="chequeogeneral" id="chequeogeneral" aria-describedby="helpId" placeholder="Descripción del chequeo">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Medicamento</label>
              <input type="text"
                class="form-control"required name="medicamento" id="medicamento" aria-describedby="helpId" placeholder="Medicamento a consumir">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Tratamiento</label>
              <input type="text"
                class="form-control" required name="tratamiento" id="tratamiento" aria-describedby="helpId" placeholder="Tratamiento a seguir">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Fecha</label>
              <input type="date"
              min="2023-01-01" required  max="2023-12-31" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha en que se realiza el reporte">
            </div>

            <select required class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="idcliente">
              <option selected disabled  >Seleccione el ID del dueño</option>
              <?php foreach($lista_clientes as $registro) {?>            
                <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                <!--lo que va entre corchetes es la llave primaria de la tabla-->
                <option value="<?php echo $registro['id_cliente']?>"><?php echo $registro['id_cliente'].": ".$registro['nombre']." ".$registro['apellido'];?></option>
              <?php }?>
            </select>

            
            <select required class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="idMascota">
              <option selected disabled>Seleccione el ID de la mascota</option>
              <?php foreach($lista_mascotas as $registro) {?>            
                <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                <!--lo que va entre corchetes es la llave primaria de la tabla-->
                <option value="<?php echo $registro['id_mascota']?>"><?php echo $registro['id_mascota'].": ".$registro['Apodo_mascota'];?></option>
              <?php }?>
            </select>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>
<?php include("../../templates/footer.php");?> 