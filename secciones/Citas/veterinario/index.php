<?php include("../../../conexionBd.php");?>
<?php include("../../../templates/header.php");?>

<div class="container d-flex justify-content-center">
    <h1><b>Agendar cita Veterinario</b></h1>
</div>

<div class="card m-auto">
    <div class="card-header d-flex justify-content-center">
        <a name="" id="" class="btn btn-primary" href="crearVet.php" role="button">Agendar Cita</a>
    </div>
    <div class="card-body">

    <div class="table-responsive-sm">
    <table class="table table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">motivo</th>               
                <th scope="col">fecha</th>
                <th scope="col">hora</th>
                <th scope="col">mascota</th>
                <th scope="col">veterinario</th>
                <th scope="col">acciones</th>
            </tr>
        </thead>
        <tbody>
            
            
        </tbody>
    </table>
</div>
    </div>

</div>

<?php include("../../../templates/footer.php"); ?>