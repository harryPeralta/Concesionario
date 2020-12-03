<?php require "views/shared/header.php"; ?>

<div class="container">
<h1> <?php echo $data["titulo"]?></h1>

        <form action="index.php?control=cliente&action=update" method="post">
            <div class="form-group">
                
                <input type="hidden" name="codigo" id="codigo" class="form-control" value= <?php echo $data["cliente"]["codigo"];?> > 
            </div>
            <div class="form-group">
                <label for="identificacion">Identificacion:</label>
                <input type="number" name="identificacion" id="identificacion" class="form-control" value= <?php echo $data["cliente"]["identificacion"];?> >
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control"  value= <?php echo $data["cliente"]["nombre"];?> >
            </div>
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control"  value= <?php echo $data["cliente"]["direccion"];?> >
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" name="telefono" id="telefono" class="form-control"  value= <?php echo $data["cliente"]["telefono"];?> >
            </div>
            <div class="form-group">
                <label for="codigoCiudad">Ciudad:</label>
                <select type="number" name="codigoCiudad" id="codigoCiudad" class="form-control">

                <?php
                    foreach($data["ciudades"] as $ciudad)
                    {
                        $codigo = $ciudad["codigo"];
                        $nombre = $ciudad["nombre"];

                        if($codigo == $data["cliente"]["codigoCiudad"])
                        {
                            echo "<option value=$codigo selected>$nombre</option>";

                        }
                        else
                        {
                            echo "<option value=$codigo>$nombre</option>";
                        }
                        
                    }
                
                ?>

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div> <br><br><br>


<?php require "views/shared/footer.php"; ?>