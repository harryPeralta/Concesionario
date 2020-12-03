<?php require "views/shared/header.php"; ?>

<div class="container">

<h1> <?php echo $data["titulo"]?></h1>
    <a href="index.php?control=vehiculo&action=insert" class="btn btn-success">Crear nuevo</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Cliente</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['vehiculos'] as $vehiculo)   { ?>
                <tr>
                    <td><?= $vehiculo['matricula'] ?></td>
                    <td><?= $vehiculo['nombreCliente'] ?></td>
                    
                    
                    <td>
                        <a href="index.php?control=vehiculo&action=view&matricula=<?= $vehiculo['matricula'] ?>" class="btn btn-info">Ver</a>
                        <a href="index.php?control=vehiculo&action=edit&matricula=<?= $vehiculo['matricula'] ?>" class="btn btn-warning">Actualizar</a>
                        <a href="index.php?control=vehiculo&action=delete&matricula=<?= $vehiculo['matricula'] ?>" class="btn btn-danger">Borrar</a>
                        
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>


<?php require "views/shared/footer.php"; ?>

