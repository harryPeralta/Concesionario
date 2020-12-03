<?php  require "views/shared/header.php"; ?>

    <div class="container"> 
    <h1> <?php echo $data["titulo"]?></h1>
        <a href="index.php?control=revision&action=insert" class="btn btn-success">Crear nueva revision</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Matricula</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['revisiones'] as $revision) {  ?>
                    <tr>
                        <td><?= $revision['codigo'] ?></td>
                        <td><?= $revision['matriculaVehiculo'] ?></td>
                        <td>
                            <a href="index.php?control=revision&action=view&codigo=<?= $revision['codigo'] ?>" class="btn btn-info">Ver</a>
                            <a href="index.php?control=revision&action=edit&codigo=<?= $revision['codigo'] ?>" class="btn btn-warning">Actualizar</a>
                            <a href="index.php?control=revision&action=delete&codigo=<?= $revision['codigo'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php  require "views/shared/footer.php"; ?>