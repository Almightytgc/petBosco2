<?php 
include("../conexionBd.php");
?>
<?php include("../templates/headervet.php");?>
<body>

  <!--inicio de nav-->
  <div class="container my-4">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg containerContent">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Bienvenido doctor <?php echo $_SESSION['usuario'] ;?></h1>
        <p class="lead pDescripcion">Su trabajo es mucho más que simplemente cuidar de los animales. Ustedes son guardianes de la salud y el bienestar de nuestros amigos de cuatro patas, y en muchos casos, sus vidas dependen de ustedes.</p>
      </div>
      <div class="col-lg-4 offset-lg-1 p-5 overflow-hidden d-flex justify-content-center ">
          <img class="vet" src="../img/vet.jpg" alt="">
      </div>
    </div>
  </div>

<?php include("../templates/footer.php"); ?>

</body>
</html>