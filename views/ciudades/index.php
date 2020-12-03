<?php require "views/shared/header.php"; ?>

<div class="container">

<h1> <?php echo $data["titulo"]?></h1>
    <a href="index.php?control=ciudad&action=insert" class="btn btn-success">Crear nueva ciudad</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['ciudades'] as $ciudad)   { ?>
                <tr>
                    <td><?= $ciudad['codigo'] ?></td>
                    <td><?= $ciudad['nombre'] ?></td>
                    <td>
                        <a href="index.php?control=ciudad&action=view&codigo=<?= $ciudad['codigo'] ?>" class="btn btn-info">Ver</a>
                        <a href="index.php?control=ciudad&action=edit&codigo=<?= $ciudad['codigo'] ?>" class="btn btn-warning">Actualizar</a>
                        <a href="index.php?control=ciudad&action=delete&codigo=<?= $ciudad['codigo'] ?>" class="btn btn-danger">Borrar</a>
                        
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>


<?php require "views/shared/footer.php"; ?>

