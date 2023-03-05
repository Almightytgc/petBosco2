<?php
include("../templates/header.php")
?>


<body class="justify-content-center">

    <div class=" justify-content-xl-center rounded">
        <div class="card text-center">
            <div class="card-header ">
                Login
            </div>

            <div class="card-body">
                <form action="validate.php" method="post">

                    <div class=" d-flex flex-column text-center p-2">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="Escribe tu usuario" required>

                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <label for="" class="form-label">Contraseña </label>
                        <input type="password" class="form-control" name="password" id="" placeholder="contraseña" required>
                    </div>

                    <div class=" d-flex flex-column text-center p-2">
                        <button type="submit" class="btn btn-primary pt">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>


    </div>




    </div>
</body>

</html>