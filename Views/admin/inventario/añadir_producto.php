<?php 
include '../templates/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <a href="panel_control.php" class="btn btn-outline-danger mb-3" type="button" id="btnNuevo">Regresar</a>
    <?php include "../../../Controller/registrar_producto.php"; ?>
    <form method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name="nombre" required>
            <div class="valid-feedback">
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Nombre Corto</label>
            <input type="text" class="form-control" name="nombre_corto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Codigo</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">#</span>
                <input type="number" class="form-control" name="codigo" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Categoria</label>
            <select name="categoria" class="form-select" id="categoria" required>
                <option selected disabled>Seleciona la categoria</option>
                <option value="1">Accesorios Musicales</option>
                <option value="2">Mochila</option>
                <option value="3">Gorras</option>
                <option value="4">Cinturon</option>
                <option value="5">Bolsas de Regalo</option>
                <option value="6">Electronicos</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Precio</label>
            <input name="precio" type="number" class="form-control" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Cantidad</label>
            <input name="cantidad" type="number" class="form-control" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="md-3 col-md-6">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" name="foto" required>
        </div>
        <div class="mb-3 col-md-8">
            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
            <textarea name="descripcion" type="text" class="form-control" id="exampleFormControlTextarea1"
                rows="3"></textarea>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="submit" class="btn btn-success" name="btnregistrar" value="ok">Registrar</button>
        </div>
    </form>
    <?php  include '../templates/footer.php' ?>
</body>

</html>