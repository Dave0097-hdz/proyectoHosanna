<?php
include_once '../templates/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>GESTION - PRODUCTOS</h1>
            </div>
        </div>
        <script>
        function eliminar(){
            var respuesta =confirm("Estas seguro que desea eliminar?                                                            (El producto solo permaneceda inactivo).")
            return respuesta
        }
    </script>
        <div class="col-md-12">
            <a href="panel_control.php" class="btn btn-outline-danger mb-3" type="button" id="btnNuevo">Regresar</a>
            <?php include "../../../Controller/baja_producto.php"; ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display nowrap" style="width: 100%;" id="tblUsuarios">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Nombre Corto</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Activo</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../../../Controller/lista_producto.php' ?>
                                <?php foreach ($resultadolista as $row) { 
                                
                                $tipo_categoria= $row['tipo_categoria'];

                                switch (true) {
                                    case $tipo_categoria==1:
                                        $tipo_categoria="Accesorios Musicales";
                                        break;
                                    case $tipo_categoria==2:
                                        $tipo_categoria="Mochila";
                                        break;
                                    
                                    case $tipo_categoria==3:
                                        $tipo_categoria="Gorras";
                                        break;

                                    case $tipo_categoria==4:
                                        $tipo_categoria="Cinturon";
                                        break;
                                    case $tipo_categoria==5:
                                        $tipo_categoria="Bolsas de Regalo";
                                        break;
                                    
                                    default:
                                        $tipo_categoria="Electronicos";
                                        break;
                                }
                                  $foto=$row['imagen']; 
                                  
                                  if (!file_exists("../../../$foto")) {
                                    $foto = "Assets/img/no_disponible.png";
                                    }
                                 ?>

                                  

                                
                                <tr>
                                <td><?= $id= $row['id_producto'] ?></td>
                                <td><?= $nombre= $row['nombre'] ?></td>
                                <td><?= $nombre_corto= $row['nombre_corto'] ?></td>
                                <td><?= $descripcion= $row['descripcion'] ?></td>
                                <td><?= $tipo_categoria ?></td>
                                <td><?= $cantidad= $row['cantidad'] ?></td>
                                <td><?= $precio= $row['precio'] ?></td>
                                <td><?= $estado= "activo" ?></td>
                                <td><?= $imagen= "<img src='$base_url$foto' width=80px height=auto>"?></td>
                                <td>
                                    <a href="../inventario/modificar_producto.php?id=<?php echo $row['id_producto']?>" name="btn_producto" id="btn_producto" class="btn btn-info">Modificar</a>
                                </td>
                                <td>
                                <a onclick="return eliminar()" href="gestor_inventario.php?id=<?php echo $row['id_producto']?>&activo=0&nombre=<?php echo $row['nombre']?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i>Eliminar</a>
                                </td>
                                <td>
                                    <a href=""></a>
                                </td>
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
<script src="<?php echo $base_url . 'Assets/js/sweetalert2@11.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/plugins/DataTables/datatables.min.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/js/custom.js' ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo $base_url . 'Assets/vendor/chart.js/Chart.min.js' ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $base_url . 'Assets/js/demo/chart-area-demo.js' ?>"></script>
<script src="<?php echo $base_url . 'Assets/js/demo/chart-pie-demo.js' ?>"></script>

</body>

</html>