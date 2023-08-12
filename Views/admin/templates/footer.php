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
                <a class="btn btn-primary" href="<?php echo $base_url . 'Controller/cerrar_sesion.php'?>">Cerrar Sesion</a>
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
<script src="<?php echo $base_url . 'Assets/js/sweetalert2@11.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/js/custom.js' ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo $base_url . 'Assets/vendor/chart.js/Chart.min.js' ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $base_url . 'Assets/js/demo/chart-area-demo.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/js/demo/chart-pie-demo.js' ?>"></script>

</body>

</html>