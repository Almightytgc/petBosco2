<?php include("../../conexionBd.php"); 

//codigos para consultar a la base de datos y mostrar opciones en los select

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM cliente");
$sentencia->execute();
$lista_clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM mascota");
$sentencia->execute();
$lista_mascotas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

if ($_POST) {
    /*codigo para hacer la consulta a la base de datos*/
    $sentencia = $conexion->prepare("SELECT * FROM reportemedico");
    $sentencia->execute();
    $lista_reportes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
}



//codigo para borrar datos
if (isset($_GET['txtID'])) {

    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("DELETE FROM reportemedico WHERE id_reporte=:id_reporte");
    $sentencia->bindParam(":id_reporte", $txtID);
    $sentencia->execute();
    header("location: index.php");
}

?>

<?php include("../../templates/headeruser.php"); ?>


<div class="container d-flex justify-content-center">
    <h1><b>Expediente médico</b></h1>
</div>

<div class="card m-auto">

    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table table text-center">
                <tr>
                    <form action="" method="post">
                        <th scope="col">
                        <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="idcliente">
                                <option selected disabled>Seleccione el ID del dueño</option>
                                <?php if($_POST) { ?>
                                    <?php foreach($lista_clientes as $registro) {?>            
                                <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                                <!--lo que va entre corchetes es la llave primaria de la tabla-->
                                <option value=""><?php echo $registro['id_cliente'].": ".$registro['nombre']." ".$registro['apellido'];?></option>
                                <?php }?>
                                <?php } ?>

                        </select>
                            </th>
                            <th scope="col">
                                <input name="" id="" class="btn btn-primary" type="submit" value="Realizar búsqueda">
                            </th>
                        </th>
                    </form>
                </tr>
    </table>
</div>
    </div>

</div>

<div class="container">    
</div>

<div class="card m-auto">
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripción chequeo general</th>
                        <th scope="col">Medicamento</th>               
                        <th scope="col">Tratamiento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
        <!--aquí usamos el foreach para poder imprimir ciclicamente todos los datos que se encuentren en la consulta-->
                    <?php foreach($lista_reportes as $registro) {?>            
                        <tr class="">
                            <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                            <!--lo que va entre corchetes es la llave primaria de la tabla-->
                            <td scope="row"><?php echo $registro['id_reporte'];?></td>
                            <td scope="row"><?php echo $registro['chequeogeneral'];?></td>
                            <td scope="row"><?php echo $registro['medicamento'];?></td>
                            <td scope="row"><?php echo $registro['tratamiento'];?></td>
                            <td scope="row"><?php echo $registro['fechareporte'];?></td>
                            <td>
                                <!--boton para editar datos-->
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id_reporte']; ?>" role="button">Actualizar</a>
                                <!--boton para borrar datos-->
                                <!--con el ? que está después del .php estamos pidiendo que atrape un parametro, que sería txtID, el contenido de txtID es igual al id que seleccionamos-->
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id_reporte']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../../templates/footer.php"); ?>
