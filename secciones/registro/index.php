<?php
include("../../templates/header.php");
include("../../conexionBd.php"); 


session_start();

/*si se reciben datos por el metodo post*/ 
if($_POST) {
    /*recolectamos los datos */
    /*validamos si existe un dato para los input, de lo contrario va a quedar en blanco */
    $nombres = (isset($_POST['nombre']) ? $_POST["nombre"]:"");
    $apellidos = (isset($_POST['apellido']) ? $_POST["apellido"]:"");
    $fecha_nacimiento = (isset($_POST['fecha_nacimiento']) ? $_POST["fecha_nacimiento"]:"");
    $num_telefonico = (isset($_POST['numero_telefonico']) ? $_POST["numero_telefonico"]:"");
    $usuario = (isset($_POST['usuario']) ? $_POST["usuario"]:"");
    $password = (isset($_POST['contrasenia']) ? $_POST["contrasenia"]:"");

    /*preparamos la insercción o sentencia sql */
    $sentencia = $conexion->prepare("INSERT INTO cliente(id_cliente, nombre, apellido, fechaNac, num_telefonico, usuario, contraseña) VALUES (null, :nombre, :apellido, :fecha_nacimiento, :numero_telefonico, :usuario, :contrasenia)");

    //asigando los valores que vienen del método post (que vienen del formulario)
    $sentencia->bindParam(":nombre",$nombres);
    $sentencia->bindParam(":apellido",$apellidos);
    $sentencia->bindParam(":fecha_nacimiento",$fecha_nacimiento);
    $sentencia->bindParam(":numero_telefonico",$num_telefonico);
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":contrasenia",$password);

    $sentencia->execute();

    $_SESSION['usuario'] = $registro['usuario'];
    $_SESSION['logueado'] = true;

    header("Location: registroMascota.php");
}
?>



<body class="justify-content-center">

    <div class="justify-content-center rounded w-24">
        <div class="card text-center">
            <div class="card-header">
                <b class="fs-4">Bienvenido</b>
                <div class="alert alert-primary" role="alert">
                    <strong>Por favor ingrese sus datos</strong>
                </div>  
            </div>

            <div class="card-body">
                <form action="" method="post">

                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="Escribe tu nombre" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" placeholder="Escribe tu apellido" required>
                        </div>
                    </div>


                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento"  min="1970-12-31" max="2004-12-31" id="" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Numero telefónico</label>
                            <input type="text" class="form-control" name="numero_telefonico" id="" placeholder="contraseña" required>

                        </div>

                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <div class="container">

                        </div>

                        
                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="" placeholder="Usuario" required>

                        
                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" id="" placeholder="contraseña" required>

                        
                    </div>

                    <div class=" d-flex flex-column text-center p-2">

                        <button type="submit" class="btn btn-primary ">Enviar</button>
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