<?php include("../../conexionBd.php");?>

<?php include("../../templates/headeruser.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM cliente");
$sentencia->execute();
$lista_clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

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
                                    <?php foreach($lista_clientes as $registro) {?>            
                                <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                                <!--lo que va entre corchetes es la llave primaria de la tabla-->
                                <option value=""><?php echo $registro['id_cliente'].": ".$registro['nombre']." ".$registro['apellido'];?></option>
                                    <?php }?>
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


<?php include("../../templates/footer.php"); ?>
