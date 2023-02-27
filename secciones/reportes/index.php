<?php include("../../conexionBd.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM reportemedico");
$sentencia->execute();
$lista_reportes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?>


<div class="container d-flex justify-content-center">
    <h1><b>Reportes médicos</b></h1>
</div>

<div class="card m-auto">
    <div class="card-header d-flex justify-content-center">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
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
                <td scope="row"><?php echo $registro['tratamiento'];?></td>
                <td scope="row"><?php echo $registro['fecha'];?></td>
                <td>27-02-23</td>
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
