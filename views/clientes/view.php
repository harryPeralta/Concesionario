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
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Ciudad</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $data["cliente"]['codigo'] ?></td>
                    <td><?= $data["cliente"]['identificacion'] ?></td>
                    <td><?= $data["cliente"]['nombre'] ?></td>
                    <td><?= $data["cliente"]['direccion'] ?></td>
                    <td><?= $data["cliente"]['telefono'] ?></td>
                    <td><?= $data["cliente"]['ciudad'] ?></td>
                </tr>
        </tbody>
    </table>
    <a href="index.php?control=cliente&action=index" class="btn btn-primary">Volver</a>
</div>


<?php require "views/shared/footer.php"; ?>