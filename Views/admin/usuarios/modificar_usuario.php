<?php
include_once '../templates/header.php';

$id=$_GET['id'];

?>

<div class="container">

    <div class="card">
        <div class="card-header bg-info">
            <h3 class="text-white">Modificar Persona</h3>
        </div>
        <?php include "../../../Controller/modificar_usuarios.php" ?>

        <div class="card-body">
            <form method="POST" autocomplete="off">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombres</label>
                        <input value="<?php echo $nombre ?>" class="form-control" name="nombre" type="text" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="apellido">Apellido</label>
                        <input value="<?php echo $apellido ?>" class="form-control" name="apellido" type="text" />  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="correo">Correo</label>
                        <input value="<?php echo $correo ?>" class="form-control" name="correo" type="email" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="telefono">Telefono</label>
                        <input value="<?php echo $telefono ?>" class="form-control" name="telefono" type="phone" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="direccion">Direccion</label>
                        <input value="<?php echo $direccion ?>" class="form-control" name="direccion" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="contraseña">Contraseña</label>
                        <input value="<?php echo $contraseña ?>" class="form-control" name="contraseña" type="password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="confirmar">Confirmar Contraseña</label>
                        <input value="<?php echo $contraseña ?>" class="form-control" name="confirmar" type="password" />
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-success" name="btn_modificar" value="ok">modificar</button>
                    <a class="btn btn-danger" href="usuarios.php">Regresar</a>
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