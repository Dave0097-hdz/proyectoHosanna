<?php include '../templates/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/css/cliente.css">
</head>
<body>
    <div class="container">
        <div class="main">
        <a href="panel_control.php" class="btn btn-outline-danger mb-3" type="button" id="btnNuevo">Regresar</a>
            <?php include "../../../Controller/modificar_usuarios.php" ?>
            <div class="row">
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1>Informacion de perfil</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Nombre</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo $nombre; ?>
                                </div>
                                <hr>
                                <div class="col-md-3">
                                    <h5>Apellido</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo $apellido; ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Correo</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                    <?php echo $correo; ?>                                    
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Telefono</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                    <?php echo $telefono; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Direccion</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                    <?php echo $direccion; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 content">
                            <h1>Proyectos Recientes</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="cold-md-3">
                                    <h5> Proyecto Hosanna</h5>
                                </div>
                                <div class ="col-md-9 text-secondary">
                                    <a href=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include '../templates/footer.php';
?>
</html>