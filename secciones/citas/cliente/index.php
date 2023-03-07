<?php include("../../../conexionBd.php"); 

$url_base = "http://localhost/petBosco2/";


    /*codigo para hacer la consulta a la base de datos*/
    $sentencia = $conexion->prepare("SELECT * FROM cita");
    $sentencia->execute();
    $citas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        /*codigo para hacer la consulta a la base de datos*/
        $sentencia = $conexion->prepare("SELECT * FROM mascota");
        $sentencia->execute();
        $mascotas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

            /*codigo para hacer la consulta a la base de datos*/
        $sentencia = $conexion->prepare("SELECT * FROM veterinario");
        $sentencia->execute();
        $veterinarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


            /*codigo para hacer la consulta a la base de datos*/
            $sentencia = $conexion->prepare("SELECT * FROM cliente");
            $sentencia->execute();
            $clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //codigo para borrar datos
    if (isset($_GET['txtID'])) {
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia = $conexion->prepare("DELETE FROM cita WHERE id_cita=:id_cita");
        $sentencia->bindParam(":id_cita", $txtID);
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
    <body>

    <?php include("../../../templates/headeruser.php");?>

    <div class="container d-flex justify-content-center">
        <h1><b>citas de <?php echo $_SESSION['usuario'];?></b></h1>
    </div>

    <div class="card m-auto text-center">
        <div class="card-header">
            <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar cita </a>
            <a name="" id="" class="btn btn-warning" href="<?php echo $url_base; ?>secciones/indexuser.php" role="button">Regresar al inicio</a>

        </div>
        

        <div class="card-body container">
            <div>
                <table id="myTable" class="display table table text-center table-bordered border-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Motivo</th>               
                            <th scope="col">ID del cliente</th>
                            <th scope="col">ID del veterinario</th>
                            <th scope="col">ID de la mascota</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($citas as $registro): ?>
                        <tr>
                            <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                            <!--lo que va entre corchetes es la llave primaria de la tabla-->
                            <td scope="row"><?php echo $registro['id_cita'];?></td>
                            <td scope="row"><?php echo $registro['fecha'];?></td>
                            <td scope="row"><?php echo $registro['motivo'];?></td>
                            <td scope="row"><?php echo $_SESSION['usuario'];?></td>
                            <td scope="row"><?php echo $registro['fk_veterinario'];?></td>
                            <td scope="row"><?php echo $registro['fk_mascota'];?></td>

                            <td>
                            <!--boton para editar datos-->

                            <br>

                            <!--boton para borrar datos-->

                            <!--con el ? que está después del .php estamos pidiendo que atrape un parametro, que sería txtID, el contenido de txtID es igual al id que seleccionamos-->
                            <a name="" id="" class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id_cita']; ?>);" role="button">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function borrar(id) {
            //index.php?txtID=
            Swal.fire({
  title: '¿Desea borrar este elemento?',
  text: "Los cambios no podrán deshacerse!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#16BE02',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Borrar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {

    window.location="index.php?txtID="+id;

  }
})
        }
    </script>

    <?php include("../../../templates/footer.php");?> 


    </body>
    </html>