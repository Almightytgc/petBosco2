<?php include("../../conexionBd.php");?>

<?php include("../../templates/headeruser.php"); 
$url_base = "http://localhost/petBosco2/";


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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center">
        <a name="" id="" class="btn btn-primary" href="<?php echo $url_base; ?>secciones/indexuser.php" role="button">Regresar</a>
    </div>


<?php include("../../templates/footer.php"); ?>
