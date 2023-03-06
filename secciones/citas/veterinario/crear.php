<?php include("../../../conexionBd.php"); 






/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM mascota");
$sentencia->execute();
$lista_mascotas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM cliente");
$sentencia->execute();
$lista_cliente = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../../templates/headervet.php");

/*form*/ 
if($_POST) {
   
    $fecha = (isset($_POST['fecha']) ? $_POST["fecha"]:"");
    $motivo = (isset($_POST['motivo']) ? $_POST["motivo"]:"");
    $fk_cliente = (isset($_POST['id_cliente']) ? $_POST["id_cliente"]:"");
    $fk_veterinario = $_SESSION['id_usuario'];
    $fk_mascota = (isset($_POST['id_mascota']) ? $_POST["id_mascota"]:"");
     

    
     $sentencia = $conexion->prepare("INSERT INTO cita(id_cita, fecha, motivo, fk_cliente, fk_veterinario, fk_mascota )
     VALUES (null, '$fecha', '$motivo', '$fk_cliente', '$fk_veterinario' , '$fk_mascota')");


    $sentencia->execute();

    header("Location: index.php");
}
?>




<img src="../../../logos/logo.png" alt="logo">



<div class="card m-auto text-center">
    <div class="card-header">
        <h14><b>Crear cita</b></h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
              <label for="" class="form-label">Fecha de cita</label>
              <input type="date"
              min="2023-01-01" required  max="2023-12-31" class="form-control" name="fecha" id="fecha" aria-describedby="helpId">
            </div>



            <div class="mb-3">
              <label for="" class="form-label">Motivo de cita</label>
              <input type="text"
                class="form-control"required name="motivo" id="motivo" aria-describedby="helpId" placeholder="Motivo de cita">
            </div>
              


            <select required class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="id_mascota">
              <option selected disabled  >Seleccione el ID de la mascota </option>
              <?php foreach($lista_mascotas as $registro) {?>            
                <option value="<?php echo $registro['id_mascota']?>"> <?php echo $registro['id_mascota'].": ".$registro['Apodo_mascota'];?></option>
              <?php }?>
            </select>

            <select required class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="id_cliente">
              <option selected disabled  >Seleccionar el dueño de la mascota </option>
              <?php foreach($lista_cliente as $registro) {?>            
                <option value="<?php echo $registro['id_cliente']?>"> <?php echo $registro['id_cliente'].": ".$registro['nombre']." - ".$registro['apellido'];?></option>
              <?php }?>
            </select>

            
          
            <button type="submit" class="btn btn-success">Guardar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>

<?php include("../../../templates/footer.php");

/*PROJECT HAS CONCLUDED */?> 

