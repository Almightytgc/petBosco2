<?php include("../../conexionBd.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM reportemedico");
$sentencia->execute();
$lista_reportes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM cliente");
$sentencia->execute();
$lista_clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//codigo para borrar datos
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("DELETE FROM reportemedico WHERE id_reporteMedico=:id_reporte");
    $sentencia->bindParam(":id_reporte", $txtID);
    $sentencia->execute();
    header("location: index.php");
}

?>

<?php include("../../templates/headeruser.php"); ?>

    <!--linkear jquery-->
    <script src="jquery-3.6.3.js"></script>

<div class="container d-flex justify-content-center">
    <h1><b>Reportes médicos</b></h1>
</div>

<div class="card m-auto">
    <div class="card-header d-flex justify-content-center">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">

    <div class="table-responsive-sm">
    <table class="table table text-center tabla_jquery">
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
    

        <!--aquí usamos el foreach para poder imprimir ciclicamente todos los datos que se encuentren en la consulta-->
        <?php foreach($lista_reportes as $registro){?>   
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
        <?php }?>
        </tbody>
    </table>
</div>
    </div>

</div>
<?php include("../../templates/footer.php"); ?>

<!--script para usar jquery para ordenar la parte de expedientes-->
<script>
  $(".tabla_jquery").ready(function() {
    $(".tabla_jquery").DataTable({
      "pageLength":3,
      lenghMenu:[
        [3, 10, 25]
      ]
    });
  })
</script>

<!--script para usar jquery para ordenar la parte de expedientes-->
    <script>
        $(Document).click(function(){
            $(".sumir").hide();
        })
    </script>

