<?php
include_once '../templates/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>GESTION - USUARIOS</h1>
            </div>
        </div>
        <script>
        function eliminar(){
            var respuesta =confirm("Estas seguro que desea eliminar?                                                            (El usuario solo permaneceda inactivo).")
            return respuesta
        }
    </script>
        <div class="col-md-12">
            <a href="guardar_usuarios.php" class="btn btn-outline-primary mb-3" type="button" id="btnNuevo">Nuevo</a>
            <a href="../inventario/panel_control.php" class="btn btn-outline-danger mb-3" type="button" id="btnNuevo">Regresar</a>
            <?php include "../../../Controller/baja_usuario.php"; ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display nowrap" style="width: 100%;" id="tblUsuarios">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombres</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Perfil</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../../../Controller/lista_usuarios.php' ?>
                                <?php foreach ($resultado as $row) { 
                                    $estado= $row['estado'];
                                    $id_cargo= $row['id_cargo'];
                                    if ($id_cargo==2 && $estado==1){
                                        $estado="Activo";
                                        $id_cargo="Vendedor";
                                    }elseif ($id_cargo==1 && $estado==1) {
                                        $estado="Activo";
                                        $id_cargo="Administrador";
                                    }
                                    ?>
                                <tr>
                                <td><?= $id= $row['id_usuario'] ?></td>
                                <td><?= $nombre= $row['nombre'] ?></td>
                                <td><?= $apellido= $row['apellido'] ?></td>
                                <td><?= $correo= $row['correo'] ?></td>
                                <td><?= $telefono= $row['telefono'] ?></td>
                                <td><?= $direccion= $row['direccion'] ?></td>
                                <td><?= $id_cargo ?></td>
                                <td><?= $estado ?></td>
                                <td>
                                    <a href="modificar_usuario.php?id=<?php echo $row['id_usuario']?>" class="btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i>Modificar</a>
                                </td>
                                <td>
                                <a onclick="return eliminar()" href="usuarios.php?id=<?php echo $row['id_usuario']?>&estado=0" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i>Eliminar</a>
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

<div id="modalRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form id="formulario" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" />
                                    </svg>
                                </span>
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido">Apellido</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" />
                                    </svg>
                                </span>
                                <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="correo">Correo</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                    </svg>
                                </span>
                                <input class="form-control" type="email" id="correo" name="correo" placeholder="Correo" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Telefono</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                    </svg>
                                </span>
                                <input class="form-control" type="number" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="direccion">Direccion</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                    </svg>
                                </span>
                                <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Direccion" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="contraseña">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
                                    </svg>
                                </span>
                                <input class="form-control" type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="submit">Registrar</button>
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss>Cancelar</button>
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