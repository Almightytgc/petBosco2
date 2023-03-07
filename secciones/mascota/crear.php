<?php
include("../../templates/headeruser.php");
include("../../conexionBd.php"); 

/*codigo para hacer la consulta a la base de datos*/
$sentencia = $conexion->prepare("SELECT * FROM mascota");
$sentencia->execute();
$lista_clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);


/*si se reciben datos por el metodo post*/ 
if($_POST) {


    /*recolectamos los datos */
    /*validamos si existe un dato para los input, de lo contrario va a quedar en blanco */
    $nombre_mascota = (isset($_POST['apodo_mascota']) ? $_POST["apodo_mascota"]:"");
    $raza = (isset($_POST['raza']) ? $_POST["raza"]:"");
    $fecha_nacimiento = (isset($_POST['fecha_nacimiento']) ? $_POST["fecha_nacimiento"]:"");
    $color = (isset($_POST['color']) ? $_POST["color"]:"");
    $altura = (isset($_POST['altura']) ? $_POST["altura"]:"");
    $condicion = (isset($_POST['condicion']) ? $_POST["condicion"]:"");
    $peso = (isset($_POST['peso']) ? $_POST["peso"]:"");
    $especie = (isset($_POST['especie']) ? $_POST["especie"]:"");
    $dueño = (intval($_POST['idcliente']) ? $_POST["idcliente"]:"");


    /*preparamos la insercción o sentencia sql */
    $sentencia = $conexion->prepare("INSERT INTO mascota(id_mascota, Apodo_mascota, 
    raza, FechaNac, color, Altura, condicionMascota, Peso, especie, fk_cliente) VALUES (null, :apodo_mascota, 
    :raza, :fecha_nacimiento, :color, :altura, :condicion, :peso, :especie, :idcliente)");


    //asigando los valores que vienen del método post (que vienen del formulario)
    $sentencia->bindParam(":apodo_mascota",$nombre_mascota);
    $sentencia->bindParam(":raza",$raza);
    $sentencia->bindParam(":fecha_nacimiento",$fecha_nacimiento);
    $sentencia->bindParam(":color",$color);
    $sentencia->bindParam(":altura",$altura);
    $sentencia->bindParam(":condicion",$condicion);
    $sentencia->bindParam(":peso",$peso);
    $sentencia->bindParam(":especie",$especie);
    $sentencia->bindParam(":idcliente",$dueño);


    $sentencia->execute();

    header("Location: index.php");
}
?>



<body class="justify-content-center">

    <div class="justify-content-center rounded w-24">
        <div class="card text-center">
            <div class="card-header">
                <div class="alert alert-primary" role="alert">
                    <strong>Ingrese los datos de la nueva mascota</strong>
                </div>          
            </div>

            <div class="card-body">
                <form action="" method="post">

                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Nombre / apodo de la mascota</label>
                            <input type="text" class="form-control" name="apodo_mascota" id="" aria-describedby="helpId" placeholder="Escriba el nombre de su mascota" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Raza</label>
                            <input type="text" class="form-control" name="raza" id="" aria-describedby="helpId" placeholder="Escriba la raza de su mascota" required>
                        </div>
                    </div>


                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Fecha de nacimiento de la mascota</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" min="2008-12-31" id="" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Color</label>
                            <input type="text" class="form-control" name="color" id="" placeholder="color de la mascota" required>

                        </div>

                    </div>

                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Altura</label>
                            <input type="text" class="form-control" name="altura" id="" required placeholder="Digite la altura en cm">
                        </div>

                        <div class="container">
                            <label for="" class="form-label">¿La mascota padece de alguna condición?</label>
                            <input type="text" class="form-control" name="condicion" id="" required>

                        </div>

                    </div>

                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Peso</label>
                            <input type="text" class="form-control" name="peso"  placeholder="Digite el peso de su mascota en libras" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Especie</label>
                            <input type="text" class="form-control" name="especie" id="" placeholder="Ejemplo: canino, felino" required>

                        </div>

                    </div>

                    <div class="container">
                    <select required class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="idcliente">
                        <option value="<?php echo $_SESSION['id_usuario']; ?>">ID de <?php echo $_SESSION['usuario'].": ".$_SESSION['id_usuario'];?></option>
                        <!--codigo de php en donde llamamos a la consulta para insertar los datos php echo $registro['id_puesto']-->
                        <!--lo que va entre corchetes es la llave primaria de la tabla-->
                    </select>

                        </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <div class="container">

                        </div>
                    </div>

                    <div class=" d-flex flex-column text-center p-2">

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>




            


        </div>

    </div>


    </div>




    </div>

    <?php include("../../templates/footer.php");?> 
</body>

</html>