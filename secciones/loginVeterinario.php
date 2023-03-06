<?php
session_start();


if ($_POST) {
    include("../conexionBd.php");

    //en esta ocasión hacemos una sub consulta para que cuente los usuarios cuyos datos coinciden
    //con los datos de la tabla clientes
    $sentencia = $conexion->prepare("SELECT*,count(*) as n_usuarios 
    FROM veterinario WHERE usuario=:usuario AND contraseña=:password");

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    //esta condición, verifica que si se encontraron resultados en la sentencia sql
    //vamos a crear las variables de sesión y redireccionamos, sino, tiramos un alert en el formulario
    if ($registro['n_usuarios'] > 0) {
        $_SESSION['usuario'] = $registro['usuario'];
        $_SESSION['logueado'] = true;
        // Guardar el ID del usuario en una variable de sesión
        $id_usuario = $registro['id_cliente'];
        $_SESSION['id_usuario'] = $id_usuario;  

        header("location: indexvet.php");

    } else {
        $mensaje = "Error: El usuario o la contraseña son incorrectos";
    }
}
?>

<?php include("../templates/header.php");?>

<img src="../logos/logo.png" alt="logo">


<div class="card text-center m-auto p-3">
    <div class="card-header">
        <h3><b>Acceso para veterinarios</b></h3>
        <div class="alert alert-primary" role="alert">
            <strong>Por favor ingrese sus datos</strong>
        </div>  
    </div>
    <div class="card-body">
    <?php if(isset($mensaje)){ ?>
        <div class="alert alert-danger" role="alert">
            <strong><?php echo $mensaje;?></strong>
        </div>
    <?php } ?>
</div>


        <form action="" method="post" class="">
            <div class="mb-3">
            <label for="" class="form-label">Usuario</label>
            <input type="text"
                class="form-control" name="usuario" id="" aria-describedby="helpId" placeholder="Digite su usuario" required>
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input type="password"
                class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Digite su contraseña" required>
            </div>
            <div class="container">
                <input name="" id="" class="btn btn-primary m-auto" type="submit" value="Iniciar sesión">
                <a name="" id="" class="btn btn-danger" href="index.php" role="button">Regresar</a>
            </div>
        </form>

    </div>

</div>

<?php include("../templates/footer.php");?>
