<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../../Assets/css/perfil.css">
    <link rel="stylesheet" href="../../Assets/css/iniciar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Crear Cuenta</h3>
                                </div>
                                <?php
                                include "../../Config/conexion.php";
                                include "../../Controller/registro_persona.php";
                                ?>
                                <div class="">
                                    <a class="btn btn-danger" href="iniciar.php">Regresar</a>
                                </div>
                                <div class="card-body">
                                    <form method="POST" autocomplete="off">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="nombre" value="<?php echo $nombre ?>" type="text" />
                                            <label for="nombre">Nombres</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="apellido" value="<?php echo $apellido ?>" type="text" />
                                            <label for="apellido">Apellido</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="correo" value="<?php echo $correo ?>" type="email" />
                                            <label for="correo">Correo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="telefono" value="<?php echo $telefono ?>" type="number" />
                                            <label for="telefono">Telefono</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="direccion" value="<?php echo $direccion ?>" type="text" />
                                            <label for="direccion">Direccion</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="contraseña" value="<?php echo $contraseña ?>" type="password" />
                                            <label for="contraseña">Contraseña</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="confirmar" value="<?php echo $confirmar ?>" type="password" />
                                            <label for="confirmar">Confirmar Contraseña</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-success" name="btnregistrar"
                                                value="ok">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>