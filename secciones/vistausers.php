<?php include("../conexionBd.php"); 

$url_base = "http://localhost/petBosco2/";

include("../templates/headervet.php");

// Obtener el ID guardado en la variable de sesión

// Hacer la consulta a la base de datos filtrando por el ID de sesión
$sentencia = $conexion->prepare("SELECT * FROM cliente");
$sentencia->execute();
$clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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


    <div class="container d-flex justify-content-center">
        <h1><b>Clientes registrados</b></h1>
    </div>

    <div class="card m-auto text-center">
        <div class="card-header">
            <a name="" id="" class="btn btn-warning" href="<?php echo $url_base; ?>secciones/indexvet.php" role="button">Regresar al inicio</a>

        </div>
        

        <div class="card-body container">
            <div>
                <table id="myTable" class="display table table text-center table-bordered border-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>               
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Número telefónico</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">DUI</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">ID del cliente</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $registro): ?>
                        <tr>
                            <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                            <!--lo que va entre corchetes es la llave primaria de la tabla-->
                            <td scope="row"><?php echo $registro['nombre'];?></td>
                            <td scope="row"><?php echo $registro['apellido'];?></td>
                            <td scope="row"><?php echo $registro['fechaNac'];?></td>
                            <td scope="row"><?php echo $registro['num_telefonico'];?></td>
                            <td scope="row"><?php echo $registro['direccion'];?></td>
                            <td scope="row"><?php echo $registro['DUI'];?></td>
                            <td scope="row"><?php echo $registro['usuario'];?></td>
                            <td scope="row">******</td>
                            <td scope="row"><?php echo $registro['id_cliente'];?></td>
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

    <?php include("../templates/footer.php");?> 


    </body>
    </html>