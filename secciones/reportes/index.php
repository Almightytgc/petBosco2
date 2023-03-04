<?php include("../../conexionBd.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM reportemedico");
$sentencia->execute();
$lista_reportes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//codigo para borrar datos
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("DELETE FROM reportemedico WHERE id_reporteMedico=:id_reporte");
    $sentencia->bindParam(":id_reporte", $txtID);
    $sentencia->execute();
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--links para boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!--links jquery-->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
</head>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable(
            {"pageLength":25,
                "language": {
                    "url":"https://cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json"
                }
            }
        );
    } );
</script>
<body>

<?php include("../../templates/headeruser.php");?>

<div class="container d-flex justify-content-center">
    <h1><b>Reportes médicos</b></h1>
</div>

<div class="card m-auto text-center">
    <div class="card-header d-flex justify-content-center">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>

    <div class="card-body container">
        <div>
            <table id="myTable" class="display table table text-center table-bordered border-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripción chequeo general</th>
                        <th scope="col">Medicamento</th>               
                        <th scope="col">Tratamiento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
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
                        <br>--------------
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
</div>
<?php include("../../templates/footer.php");?> 
</body>
</html>