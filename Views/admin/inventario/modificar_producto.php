<?php
include_once '../templates/header.php';

$id=$_GET['id'];

?>

<div class="container">

    <div class="card">
        <div class="card-header bg-info">
            <h3 class="text-white">Modificar Producto</h3>
        </div>
        <?php include "../../../Controller/modificar_producto.php"?>

        <div class="card-body">
        <form method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre Completo</label>
            <input value="<?php echo $nombre ?>" type="text" class="form-control" name="nombre" required>
            <div class="valid-feedback">
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Nombre Corto</label>
            <input value="<?php echo $nombre_corto ?>" type="text" class="form-control" name="nombre_corto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Codigo</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">#</span>
                <input value="<?php echo $codigo ?>" type="number" class="form-control" name="codigo"
                    aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Categoria</label>
            <select value="<?php echo $tipo_categoria ?>" name="categoria" class="form-select" id="categoria" required>
                <option selected disabled required>Seleciona la categoria</option>
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
            <input value="<?php echo $precio ?>" name="precio" type="number" class="form-control" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Cantidad</label>
            <input value="<?php echo $cantidad ?>" name="cantidad" type="number" class="form-control" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="md-3 col-md-6">
            <label for="imagen">Imagen</label>
            <input value="" type="file" class="form-control-file" name="foto" required>
        </div>
        <div class="mb-3 col-md-8">
            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
            <input value="<?php echo $descripcion ?>" name="descripcion" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="submit" class="btn btn-success" name="btnregistrar" value="ok">Registrar</button>
            <a class="btn btn-danger" href="<?php echo BASE_URL . 'Views/admin/inventario/gestor_inventario.php'?>">Regresar</a>
        </div>
    </form>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para partir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecione "Cerrar Sesion" a continuacion si esta listo para finalizar su sesion
                actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="<?php echo $base_url . 'index.php' ?>">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo $base_url . 'Assets/vendor/jquery/jquery.min.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo $base_url . 'Assets/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo $base_url . 'Assets/js/sb-admin-2.min.js' ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo $base_url . 'Assets/vendor/chart.js/Chart.min.js' ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $base_url . 'Assets/js/demo/chart-area-demo.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/js/demo/chart-pie-demo.js' ?>"></script>

</body>

</html>