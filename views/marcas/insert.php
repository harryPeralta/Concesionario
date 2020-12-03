<?php require "views/shared/header.php"; ?>

<div class="container">
<h1> <?php echo $data["titulo"]?></h1>
        <form action="index.php?control=marca&action=store" method="post">
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="number" name="codigo" id="codigo" class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>


<?php require "views/shared/footer.php"; ?>