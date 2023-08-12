<?php
include '../templates/header.php';
?>
<div class="container">
    <a href="panel_control.php" class="btn btn-outline-danger mb-3" type="button" id="btnNuevo">Regresar</a>
    <hr class="my-3">
    <main>
        <?php
            include '../../../Controller/registro_ventas.php';
            ?>
        <form method="POST">
            <div class="row g-10">
                <div class="col-md-17 col-lg-14 order-md-last">
                    <div class="col-md-12 col-lg-9">
                        <h4 class="mb-3">Registro de ventas</h4>
                        <div class="row g-3">

                            <?php include '../../../Controller/lista_producto.php';?>
                            <div class="col-sm-6">
                                <label for="validationCustom04" class="form-label">Codigo</label>
                                <select name="codigo" class="form-select" id="codigo" required>
                                    <option selected disabled>Seleciona el codigo del producto</option>
                                    <?php
                                    foreach ($resultadolista as $row) {
                                        $codigo= $row['codigo'];
                                        $nombreproducto= $row['nombre'];
                                    ?>

                                    <option value="<?php echo $codigo ?>"><?php echo "$codigo---$nombreproducto"; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <script>
                                document.ready = document.getElementById("codigo").value = "<?php echo $codigopost ?>";
                                </script>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cantidad" class="form-label">Cantidad
                                    <br><?php echo "$almacen  en existencia" ?></label>
                                <div class="input-group has-validation">
                                    <input value="<?php echo $cantidad ?>" name="cantidad" id="cantidad" min="1"
                                        step="1" max="" required type="number" class="form-control">
                                    <button class="btn btn-info" name="btncodigo" value="ok">Ok</button>
                                </div>
                            </div>


                            <div class="col-sm-8">
                                <label for="articulo" class="form-label">Nombre del Articulo</label>
                                <input value="<?php echo $nombre ?>" type="text" class="form-control" name="articulo"
                                    id="articulo">
                            </div>

                            <div class="col-md-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" min="1" step="1" value="<?php echo $precio ?>" name="precio"
                                    id="precio" class="form-control">
                            </div>

                            <div class="col-6">
                                <label for="total" class="form-label">Total a Pagar:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">$</span>
                                    <input type="number" min="1" value="<?php echo $total ?>" class="form-control"
                                        name="total" id="total">
                                </div>
                            </div>

                            <div class="col-10">
                                <label for="fecha" class="form-label">Fecha de la compra:</label>
                                <input type="date" class="form-control" value="<?php echo $fecha ?>" name="fecha"
                                    id="fecha">
                            </div>

                            <hr class="my-3">

                            <button class="w-100 btn btn-success btn-lg shadow h-100" type="submit" name="btnventa"
                                id="btnventa" value="ok">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
</div>
<!-- Footer -->
<?php
include '../templates/footer.php';
?>

</body>

</html>