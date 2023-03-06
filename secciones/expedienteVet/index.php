<?php include("../../conexionBd.php");?>

<?php include("../../templates/headeruser.php"); 

//consulta para buscar los reportes médicos que tengan el id del usuario que ha iniciado sesión
$sentencia = $conexion->prepare("SELECT * FROM reporteMedico WHERE fk_cliente = :id_usuario");
$sentencia->bindParam(':id_usuario', $_SESSION['id_usuario'], PDO::PARAM_INT);
$sentencia->execute();
$lista_reportes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container d-flex justify-content-center">
    <h1><b>Expediente médico de <?php echo $_SESSION['usuario'] ?></b></h1>
</div>

<div class="card-body container">
        <div>
            <table id="" class="table table text-center table-hover bg-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripción chequeo general</th>
                        <th scope="col">Medicamento</th>               
                        <th scope="col">Tratamiento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">ID del cliente</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_reportes as $registro): ?>
                    <tr>
                        <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                        <!--lo que va entre corchetes es la llave primaria de la tabla-->
                        <td scope="row"><?php echo $registro['id_reporteMedico'];?></td>
                        <td scope="row"><?php echo $registro['ChequeoGeneral'];?></td>
                        <td scope="row"><?php echo $registro['Medicamento'];?></td>
                        <td scope="row"><?php echo $registro['Tratamiento'];?></td>
                        <td scope="row"><?php echo $registro['fechaReporte'];?></td>
                        <td scope="row"><?php echo $registro['fk_cliente'];?></td>

                        <td>
                        <!--boton para editar datos-->
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id_reporteMedico']; ?>" role="button">Actualizar</a>
                        
                        <!--boton para borrar datos-->

                        <!--con el ? que está después del .php estamos pidiendo que atrape un parametro, que sería txtID, el contenido de txtID es igual al id que seleccionamos-->
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id_reporteMedico']; ?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include("../../templates/footer.php"); ?>
