<?php  require "views/shared/header.php"; ?>

    <div class="container"> 
    <h1> <?php echo $data["titulo"]?></h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cambio Frenos</th>
                    <th>Cambio Aceite</th>
                    <th>cambio Filtros</th>
                    <th>Otros</th>
                    <th>Matricula</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td><?= $data["revision"] ["codigo"]; ?></td>
                        <td><?= $data["revision"] ["cambioFrenos"]; ?></td>
                        <td><?= $data["revision"] ["cambioAceite"]; ?></td>
                        <td><?= $data["revision"] ["cambioFiltros"]; ?></td>
                        <td><?= $data["revision"] ["otros"]; ?></td>
                        <td><?= $data["revision"] ["matriculaVehiculo"]; ?></td>
                    </tr>
                
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>
    <?php  require "views/shared/footer.php"; ?>