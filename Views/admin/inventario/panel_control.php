<?php
include "../templates/header.php";
$cargousuario=$_SESSION["id_cargo"];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SISTEMA GESTOR - HOSANNA</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 shadow h-100">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 text-center"><a href="../inventario/gestor_inventario.php">REVISAR INVENTARIO</a></div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">Ver productos en Existencias.</div>
                            <img src="<?php echo $base_url . 'Assets/img/undraw_Predictive_analytics_re_wxt8.png' ?>" width="210">
                            <a href="../inventario/gestor_inventario.php" class="d-none d-sm-block btn btn-sm btn-dark shadow-sm">INGRESAR</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 shadow h-100">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 text-center"><a href="<?php echo $base_url . 'Views/admin/inventario/ventas_productos.php' ?>">AREA DE VENTAS</a></div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">Registro de Venta.</div>
                            <img src="<?php echo $base_url . 'Assets/img/undraw_Shopping_Bags_nif5.png' ?>" width="280">
                            <a href="<?php echo $base_url . 'Views/admin/inventario/ventas_productos.php' ?>" class="d-none d-sm-block btn btn-sm btn-dark shadow-sm">INGRESAR</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 shadow h-100">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 text-center"><a href="<?php echo $base_url . 'Views/admin/inventario/añadir_producto.php' ?>">REGISTRAR PRODUCTOS</a></div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">Registrar productos nuevos</div>
                            <img src="<?php echo $base_url . 'Assets/img/undraw_Preferences_popup_re_4qk0.png' ?>" width="200">
                            <a href="<?php echo $base_url . 'Views/admin/inventario/añadir_producto.php' ?>" class="d-none d-sm-block btn btn-sm btn-dark shadow-sm">INGRESAR</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <?php
        if ($cargousuario==1){

        echo "<div class='col-xl-3 col-md-6 mb-4'>
            <div class='card border-left-primary shadow h-100 py-2'>
                <div class='card-body'>
                    <div class='row no-gutters align-items-center'>
                        <div class='col mr-2 shadow h-100'>
                            <div class='text-xs font-weight-bold text-danger text-uppercase mb-1 text-center'><a href='informe_ventas.php'>INFORME DE VENTAS</a></div>
                            <div class='text-xs font-weight-bold text-success text-uppercase mb-1 text-center'>Area para realizar cortes de caja.</div>
                            <img src='../../../Assets/img/undraw_Designer_girl_re_h54c.png' width='200'>
                            <a href='informe_ventas.php' class='d-none d-sm-block btn btn-sm btn-dark shadow-sm'>INGRESAR</a>
                        </div>
                        <div class='col-auto'>
                            <i class='fas fa-calendar fa-2x text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>";

        echo "<div class='col-xl-3 col-md-6 mb-4'>
            <div class='card border-left-primary shadow h-100 py-2'>
                <div class='card-body'>
                    <div class='row no-gutters align-items-center'>
                        <div class='col mr-2 shadow h-100'>
                            <div class='text-xs font-weight-bold text-danger text-uppercase mb-1 text-center'><a href='usuarios.php'>USUARIOS</a></div>
                            <div class='text-xs font-weight-bold text-success text-uppercase mb-1 text-center'>Ver lista de Usuarios.</div>
                            <img src='../../../Assets/img/undraw_Group_hangout_re_4t8r.png' width='280'>
                            <a href='../usuarios/usuarios.php' class='d-none d-sm-block btn btn-sm btn-dark shadow-sm'>INGRESAR</a>
                        </div>
                        <div class='col-auto'>
                            <i class='fas fa-comments fa-2x text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>";

        echo "<div class='col-xl-3 col-md-6 mb-4'>
            <div class='card border-left-primary shadow h-100 py-2'>
                <div class='card-body'>
                    <div class='row no-gutters align-items-center'>
                        <div class='col mr-2 shadow h-100'>
                            <div class='text-xs font-weight-bold text-danger text-uppercase mb-1 text-center'><a href='lista_bajas_usuarios.php'>LISTA DE BAJAS DE USUARIOS</a></div>
                            <div class='text-xs font-weight-bold text-success text-uppercase mb-1 text-center'>Ver lista de usuarios con bajas o eliminaciones.</div>
                            <img src='../../../Assets/img/undraw_articles_wbpb.png' width='200'>
                            <a href='../usuarios/lista_bajas_usuarios.php' class='d-none d-sm-block btn btn-sm btn-dark shadow-sm'>INGRESAR</a>
                        </div>
                        <div class='col-auto'>
                            <i class='fas fa-comments fa-2x text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 shadow h-100">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 text-center"><a href="<?php echo $base_url . 'Views/admin/inventario/baja_producto.php' ?>">LISTA DE BAJAS DE PRODUCTOS</a></div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">Ver lista de productos con bajas o eliminaciones.</div>
                            <img src="<?php echo $base_url . 'Assets/img/undraw_All_the_data_re_hh4w.png'  ?>" width="300">
                            <a href="<?php echo $base_url . 'Views/admin/inventario/baja_producto.php' ?>" class="d-none d-sm-block btn btn-sm btn-dark shadow-sm">INGRESAR</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 shadow h-100">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 text-center"><a href="<?php echo $base_url . 'Views/admin/inventario/prueba.php' ?>">LISTA DE PEDIDOS</a></div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">Ver lista de pedidos.</div>
                            <img src="<?php echo $base_url . 'Assets/img/undraw_Right_places_re_3sve.png'  ?>" width="230">
                            <a href="<?php echo $base_url . 'Views/admin/inventario/lista_pedidos.php' ?>" class="d-none d-sm-block btn btn-sm btn-dark shadow-sm">INGRESAR</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "../templates/footer.php";
?>