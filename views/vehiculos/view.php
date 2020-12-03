<?php require "views/shared/header.php"; ?>

<div class="container">

<h1> <?php echo $data["titulo"]?></h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $data["vehiculo"]['matricula'] ?></td>
                    <td><?= $data["vehiculo"]['modelo'] ?></td>
                    <td><?= $data["vehiculo"]['color'] ?></td>
                    <td><?= $data["vehiculo"]['precio'] ?></td> 
                    <td><?= $data["vehiculo"]['descripcion'] ?></td>
                    <td><?= $data["vehiculo"]['nombre'] ?></td>                
                </tr>

        </tbody>
    </table>
    <a href="index.php?control=vehiculo&action=index" class="btn btn-primary">Volver</a>
</div>


<?php require "views/shared/footer.php"; ?>