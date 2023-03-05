<?php
include("../../templates/header.php");

include("../../conexionBd.php");

if ($_POST) {

    $nombre = isset($_POST["nombre"]) ? $_POST['nombre'] : "";
    $apellido = isset($_POST["apellido"]) ? $_POST['apellido'] : "";
    $fechaNac = isset($_POST["fechaNac"]) ? $_POST['fechaNac'] : "";
    $num_telefonico = isset($_POST["num_telefonico"]) ? $_POST['num_telefonico'] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST['direccion'] : "";
    $usuario = isset($_POST["usuario"]) ? $_POST['usuario'] : "";
    $DUI = isset($_POST["DUI"]) ? $_POST['DUI'] : "";
    $password = isset($_POST["password"]) ? $_POST['password'] : "";
    //TypeUser sirve para agendar segun vet o client.
    $typeUser = 0;



    $sentencia = $conexion->prepare("INSERT INTO cliente(id_cliente, usuario, nombre, apellido, fechaNac, 
    num_telefonico, direccion, DUI, contraseña, typeUser)
    VALUES 
    (null, '$usuario', '$nombre', '$apellido', '$fechaNac', '$num_telefonico', '$direccion',
    '$DUI', '$password', '$typeUser')");

    //sin bindParam pq saber q error loco tenia esa onda asi q mejor comillas simples horchata rodrigo
    $sentencia->execute();
}
?>


<body class="justify-content-center">

    <div class="justify-content-center rounded w-24">
        <div class="card text-center">
            <div class="card-header">
                <b class="fs-4">Regístrate</b>
            </div>

            <div class="card-body">
                <form action="index.php" method="post">

                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="Escribe tu nombre" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" placeholder="Escribe tu apellido" required>
                        </div>
                    </div>


                    <div class=" d-flex flex-row text-start p-2">
                        <div class="container">
                            <label for="" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fechaNac" max='2022-04-04' id="" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Numero telefónico</label>
                            <input type="text" class="form-control" name="num_telefonico" id="" placeholder="Ingrese su DUI" required min=100000000 max=999999999>

                        </div>

                    </div>

                    <div class=" d-flex flex-column text-center p-2">

                        <div class="container">
                            <label for="" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="" placeholder="Ingrese su usuario" required>
                        </div>

                        <div class=" d-flex flex-column text-center p-2">

                            <div class="container">
                                <label for="" class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="" placeholder="Ingrese su direccion" required>
                            </div>



                        </div>

                        <div class=" d-flex flex-column text-center p-2">

                            <div class="container">
                                <label for="" class="form-label">DUI</label>
                                <input type="text" class="form-control" name="DUI" id="" placeholder="Ingrese su DUI" required min=100000000 max=999999999>
                            </div>



                        </div>


                        <div class=" d-flex flex-column text-center p-2">

                            <div class="container">
                                <label for="" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="" placeholder="Ingrese su contraseña" required>
                            </div>



                        </div>

                        <div class=" d-flex flex-column text-center p-2">

                            <button type="submit" class="btn btn-primary ">Registro</button>
                        </div>
                </form>
            </div>
        </div>

    </div>


    </div>

    <?php
    include("../../templates/footer.php")
    ?>
</body>