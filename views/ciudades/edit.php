<?php require "views/shared/header.php"; ?>

<div class="container">
<h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=ciudad&action=update" method="post">

                <input type="hidden" name="codigo" value = <?php echo $data["codigo"]; ?> >

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value = <?php echo $data["ciudad"]["nombre"]; ?> >
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>


<?php require "views/shared/footer.php"; ?>
