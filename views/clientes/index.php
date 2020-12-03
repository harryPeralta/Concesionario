<?php require "views/shared/header.php"; ?>

<div class="container">

<h1> <?php echo $data["titulo"]?></h1>
    <a href="index.php?control=cliente&action=insert" class="btn btn-success">Crear nuevo</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Identificacion</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['clientes'] as $cliente)   { ?>
                <tr>
                    <td><?= $cliente['codigo'] ?></td>
                    <td><?= $cliente['identificacion'] ?></td>
                    <td><?= $cliente['nombre'] ?></td>
                    <td>
                    
                        <a href="index.php?control=cliente&action=view&codigo=<?= $cliente['codigo'] ?>"
                        class="btn btn-info"> Ver </a>

                        <a href="index.php?control=cliente&action=edit&codigo=<?= $cliente['codigo'] ?>"
                        class="btn btn-warning"> Actualizar </a>

                        <a href="index.php?control=cliente&action=delete&codigo=<?= $cliente['codigo'] ?>"
                        class="btn btn-danger"> Eliminar </a>

                        
                    </td>
                </tr>
            <?php } ?>

    </table>
</div>


<?php require "views/shared/footer.php"; ?>