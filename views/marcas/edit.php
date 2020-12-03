<?php require "views/shared/header.php"; ?>

<div class="container">
<h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=marca&action=update" method="post">

                <input type="hidden" name="codigo" value = <?php echo $data["codigo"]; ?> >

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" value = <?php echo $data["marca"]["descripcion"]; ?> >
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>


<?php require "views/shared/footer.php"; ?>