<?php  require "views/shared/header.php"; ?>

    <div class="container">
    <h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=revision&action=store" method="post">
            <input type="hidden" name="codigo">
            <div>
                <label for="cambioFrenos">Cambio Frenos</label>
                <input type="text" name="cambioFrenos" id="cambioFrenos" class="form-control">
            </div>
            <div>
                <label for="cambioAceite">Cambio Aceite</label>
                <input type="text" name="cambioAceite" id="cambioAceite" class="form-control">
            </div>
            <div>
                <label for="cambioFiltros">Cambio Filtros</label>
                <input type="text" name="cambioFiltros" id="cambioFiltros" class="form-control">
            </div>
            <div>
                <label for="otros">Otros</label>
                <input type="text" name="otros" id="otros" class="form-control">
            </div>
            <div>
                <label for="matricula">Matricula</label>
                <select name="matriculaVehiculo" id="matriculaVehiculo" class="form-control">
                    <?php
                        foreach($data["vehiculos"] as $vehiculo)
                        {
                            $matricula = $vehiculo["matricula"];
                            echo "<option value=$matricula>$matricula</option>";
                        }
                    ?>
                </select>
            </div> <br>
            <button type="sumbit" class="btn btn-primary">Crear</button>
        </form>
    </div>

    <?php  require "views/shared/footer.php"; ?>