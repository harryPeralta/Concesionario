<?php  require "views/shared/header.php"; ?>

    <div class="container">
    <h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=revision&action=update" method="post">
            <input type="hidden" name="codigo" value=<?php echo $data["codigo"]; ?>>
            <div>
                <label for="cambioFrenos">Cambio Frenos</label>
                <input type="text" name="cambioFrenos" id="cambioFrenos" class="form-control" value=<?php echo $data["revision"]["cambioFrenos"]; ?>>
            </div>
            <div>
                <label for="cambioAceite">Cambio Aceite</label>
                <input type="text" name="cambioAceite" id="cambioAceite" class="form-control" value=<?php echo $data["revision"]["cambioAceite"]; ?>>
            </div>
            <div>
                <label for="cambioFiltros">Cambio Filtros</label>
                <input type="text" name="cambioFiltros" id="cambioFiltros" class="form-control" value=<?php echo $data["revision"]["cambioFiltros"]; ?>>
            </div>
            <div>
                <label for="otros">otros</label>
                <input type="text" name="otros" id="otros" class="form-control" value=<?php echo $data["revision"]["otros"]; ?>>
            </div>
            <div>
                <label for="matriculaVehiculo">Matricula</label>
                <select name="matriculaVehiculo" id="matriculaVehiculo" class="form-control" >
                <?php
                        foreach($data["vehiculos"] as $vehiculo)
                        {
                            $matricula = $vehiculo["matricula"];
                            if($matricula == $data["revision"]["matriculaVehiculo"])
                            {
                                echo "<option value=$matricula selected>$matricula</option>";
                            }
                            else
                            {
                                echo "<option value=$matricula>$matricula</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <button type="sumbit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <?php  require "views/shared/footer.php"; ?>