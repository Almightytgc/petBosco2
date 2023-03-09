<?php
$url_base = "http://localhost/petBosco2/";


session_start();


if (!isset($_SESSION['usuario'])) {
  header("location:".$url_base."secciones/login.php");
}
  

?>

<!DOCTYPE html>
<html lang="en">
<head>

<!--estilo de nav-->
<style>
*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: 'Roboto', sans-serif;
}


.encabezado {
    background-color: #3f3434;
    width: 100%;
    height: 100%;
    color: #fff;
}

.navName {
    color: #fff;
    font-weight: bolder;
}

/*cambiar url si es que se pone otra imagen*/
body {
  display: flex;
    flex-wrap: wrap;
    min-height: 100vh;
    background: url("<?php echo $url_base;?>assets/svg/waves.svg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.containerContent {
  background-color: #fbf3f1;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fav icon-->
    <link rel="shortcut icon" href="logos/logo.png"/>
    
    <!--links para boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <!--sweet alert-->
        <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>PetBosco</title>
</head>
<body>

  <!--inicio de nav-->
  <header class="p-3 encabezado mb-5">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <h1>PetBosco</h1>
        </ul>

        <div class="text-end">
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/vistausers.php" role="button">Clientes</a>
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/mascota/indexvet.php" role="button">Mascotas</a>
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/citas/veterinario" role="button">Citas</a>
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/reportes/index.php" role="button">Reportes médicos</a>
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/cerrar.php" role="button">Cerrar sesión</a>

        </div>
      </div>
    </div>
  </header>
  <!--fin de nav-->