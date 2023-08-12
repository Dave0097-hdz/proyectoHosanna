<?php 
include '../../Config/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> GESTOR_HOSANNA </title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo BASE_URL . 'Assets/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo BASE_URL . 'Assets/css/sb-admin-2.min.css' ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo BASE_URL . 'Assets/img/Logo_Hossna.png'; ?>" type="image/x-icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">BIENVENIDO</h1>
                                    </div>
                                    <form class="user" autocomplete="off" method="POST" action=""> 
                                        <?php include '../../Controller/validacionAdmin.php';?>
                                        <div class="form-group">
                                            <label for="correo" class="form-label">Correo Electronio <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control form-control-user" id="correo" name="correo" aria-describedby="correo" placeholder="Ingresa la Direccion de su Correo...">
                                        </div>
                                        <div class="form-group">
                                            <label for="contraseña" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control form-control-user" id="contraseña" name="contraseña" aria-describedby="clave" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <input name="btn-validarAdmin" class="btn btn-primary btn-user btn-block" type="submit" value="Acceso">
                                        <a class="btn btn-danger btn-user btn-block" href="../../index.php">Regresar</a>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Olvidaste tu Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Crea una Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo BASE_URL . 'Assets/vendor/jquery/jquery.min.js' ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo BASE_URL . 'Assets/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo BASE_URL . 'Assets/js/sb-admin-2.min.js' ?>"></script>

</body>

</html>