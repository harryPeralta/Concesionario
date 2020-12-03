<?php require "views/shared/header.php"; ?>

<div class="container">

    <<h1> <?php echo $data["titulo"]?></h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $data["ciudad"]['codigo'] ?></td>
                    <td><?= $data["ciudad"]['nombre'] ?></td>                 
                </tr>

        </tbody>
    </table>
    <a href="index.php?control=ciudad&action=index" class="btn btn-primary">Volver</a>
</div>


<?php require "views/shared/footer.php"; ?>

