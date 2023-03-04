<?php
include("../templates/header.php")
?>


<body class="justify-content-center">

    <div class="justify-content-center rounded w-24">
        <div class="card text-center">
            <div class="card-header">
                <b class="fs-4">Bienvenido</b>
            </div>

            <div class="card-body">
                <form action="validate.php" method="post">

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
                            <input type="date" class="form-control" name="fecha_nacimiento" max='2022-04-04' id="" required>
                        </div>

                        <div class="container">
                            <label for="" class="form-label">Numero telefónico</label>
                            <input type="password" class="form-control" name="numero_telefonico" id="" placeholder="contraseña" required>

                        </div>

                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <div class="container">

                        </div>
                        r="contraseña" required>

                        
                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="" placeholder="contraseña" required>

                        
                    </div>

                    <div class=" d-flex flex-column text-center p-2">

                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>



            


        </div>

    </div>


    </div>




    </div>
</body>

</html>