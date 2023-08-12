<?php
include "../templates/header.php";
$id_usuario_info=$_SESSION["id_usuario"];
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>GESTION - PEDIDOS</h1>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a href="panel_control.php" class="btn btn-outline-danger mb-3" type="button" id="btnNuevo">Regresar</a>
                        <a href="../../../pdf/informe_pedido.php? echo $row['id_pedido'] ?>&v=<?php echo $id_usuario_info ?>&estado=1" target=" _blank" class="btn btn-info"><i class="fas fa-file-pdf"></i>Informe general</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display nowrap" style="width: 100%;" id="tblUsuarios">
                            <thead>
                                <tr>
                                    <th>ID Pedido</th>
                                    <th>ID Usuario</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>ID Producto</th>
                                    <th>Nombre del Producto</th>
                                    <th>Imagen del Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Fecha de Pedido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include "../../../Controller/lista_pedido.php"; ?>
                                <?php foreach ($resultado as $row) {
                                    $foto = $row['imagen']; 
                                    
                                    if (!file_exists("../../../$foto")) {
                                        $foto = "Assets/img/no_disponible.png";
                                        }
                                    ?>
                                    <tr>
                                        <td><?= $row["id_pedido"] ?></td>
                                        <td><?= $row["id_usuario"] ?></td>
                                        <td><?= $row["nombre"] ?></td>
                                        <td><?= $row["correo"] ?></td>
                                        <td><?= $row["id_producto"] ?></td>
                                        <td><?= $row["nombre_producto"] ?></td>
                                        <td><?= $imagen = "<img src='$base_url$foto' width=80px height=auto>" ?></td>
                                        <td><?= $row["cantidad"] ?></td>
                                        <td><?= $row["total"] ?></td>
                                        <td><?= $row["fecha_pedido"] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para partir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecione "Cerrar Sesion" a continuacion si esta listo para finalizar su sesion actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="<?php echo $base_url . 'Controller/cerrar_sesion.php' ?>">Cerrar Sesion</a>
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