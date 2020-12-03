<?php require "views/shared/header.php"; ?>

<div class="container margen">
<h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=vehiculo&action=update" method="post">

                <input type="hidden" name="matricula" value = <?php echo $data["matricula"]; ?> >

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="number" name="modelo" id="modelo" class="form-control" value = <?php echo $data["vehiculo"]["modelo"]; ?> >
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" name="color" id="color" class="form-control"value = <?php echo $data["vehiculo"]["color"]; ?> >          
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control" value = <?php echo $data["vehiculo"]["precio"]; ?> >
            </div>
            <div class="form-group">
                <label for="codigoCliente">Cliente:</label>
                <select type="number" name="codigoCliente" id="codigoCliente" class="form-control">

                <?php
                    foreach($data["clientes"] as $cliente)
                    {
                        $codigo = $cliente["codigo"];
                        $nombre = $cliente["nombre"];
                        if($codigo == $data["vehiculo"]["codigoCliente"])
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
            <div class="form-group">
                <label for="codigoMarca">Marca:</label>
                <select type="number" name="codigoMarca" id="codigoMarca" class="form-control">

                <?php
                    foreach($data["marcas"] as $marca)
                    {
                        $codigo = $marca["codigo"];
                        $descripcion = $marca["descripcion"];
                        if($codigo == $data["vehiculo"]["codigoCliente"])
                        {
                            
                            
                            echo "<option value=$codigo selected>$descripcion</option>";
                        }
                        else
                        {

                            echo "<option value=$codigo>$descripcion</option>";
                           
                        }
                    }
                
                ?>
                </select>
            </div> 
            <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>


<?php require "views/shared/footer.php"; ?>