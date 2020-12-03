<?php require "views/shared/header.php"; ?>

<div class="container">

<h1> <?php echo $data["titulo"]?></h1>
    <a href="index.php?control=marca&action=insert" class="btn btn-success">Crear nuevo</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['marcas'] as $marca)   { ?>
                <tr>
                    <td><?= $marca['codigo'] ?></td>
                    <td><?= $marca['descripcion'] ?></td>
                    <td>
                        <a href="index.php?control=marca&action=view&codigo=<?= $marca['codigo'] ?>" class="btn btn-info">Ver</a>
                        <a href="index.php?control=marca&action=edit&codigo=<?= $marca['codigo'] ?>" class="btn btn-warning">Actualizar</a>
                        <a href="index.php?control=marca&action=delete&codigo=<?= $marca['codigo'] ?>" class="btn btn-danger">Borrar</a>
                        
                        
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>


<?php require "views/shared/footer.php"; ?>