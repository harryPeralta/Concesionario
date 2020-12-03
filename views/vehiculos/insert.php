<?php require "views/shared/header.php"; ?>

<div class="container">
<h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=vehiculo&action=store" method="post">
            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" name="matricula" id="matricula" class="form-control">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="number" name="modelo" id="modelo" class="form-control">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" name="color" id="color" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control">
            </div>
            <div class="form-group">
                <label for="codigoCliente">Cliente:</label>
                <select type="number" name="codigoCliente" id="codigoCliente" class="form-control">

                <?php
                    foreach($data["clientes"] as $cliente)
                    {
                        $codigo = $cliente["codigo"];
                        $nombre = $cliente["nombre"];
                        echo "<option value=$codigo>$nombre</option>";
                    }
                
                ?>

                </select>
            </div>
            <div class="form-group">
                <label for="codigoMarca">Marca:</label>
                <select type="number" name="codigoMarca" id="codigoMarca" class="form-control">

                <?php
                    foreach($data["marcas"] as $marca)
                    {
                        $codigo = $marca["codigo"];
                        $descripcion = $marca["descripcion"];
                        echo "<option value=$codigo>$descripcion</option>";
                    }
                
                ?>
                </select>
            </div> 
            <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>


<?php require "views/shared/footer.php"; ?>
