<?php
$url_base = "http://localhost/petBosco2/";

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

.logo {
    width: 500px;
    height: 450px;
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


    <!--links jquery-->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>

    <!--sweet alert-->
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>PetBosco</title>
</head>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<body>

  <!--inicio de nav-->
  <header class="p-3 encabezado mb-5">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <h1>PetBosco</h1>
        </ul>

        <div class="text-end">
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/registro/index.php" role="button">Registrarse</a>
          <a name="" id="" class="btn btn-outline-light me-2" href="<?php echo $url_base;?>secciones/login.php" role="button">Iniciar sesi??n</a>
        </div>
      </div>
    </div>
  </header>
  <!--fin de nav-->