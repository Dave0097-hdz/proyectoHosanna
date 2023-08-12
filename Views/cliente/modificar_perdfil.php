<?php
include '../templates/header.php';
?>

<div class="container">

    <div class="card">
        <div class="card-header bg-info">
            <h3 class="text-white">Modificar Perfil</h3>
        </div>
        <?php include "../../Controller/modificar_usuarios.php" ?>

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
                    <a class="btn btn-danger" href="<?php echo BASE_URL . 'Views/cliente/perfil.php' ?>">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>