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
            <div class="topbar">
                <a href="<?php echo BASE_URL . 'Controller/cerrar_sesion.php' ?>">Cerrar Sesion</a>
                <a href="">Soporte</a>
                <a href="<?php echo BASE_URL ?>">Inicio</a>
            </div>
            <?php include "../../Controller/modificar_usuarios.php" ?>
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="car-body">
                            <img src="../../Assets/img/undraw_profile.svg" width="150">
                            <div class="mt-43">
                                <h3><?php echo $nombre; ?></h3><br><br>
                                <a href="<?php echo BASE_URL . 'Views/cliente/modificar_perdfil.php' ?>">Editar_perfil</a>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1>Acerca de</h1>
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
                                    Proyecto Descripcion
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>