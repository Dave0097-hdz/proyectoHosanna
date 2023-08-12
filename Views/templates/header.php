<?php
require '../../Config/config.php';
require '../../Config/database.php';

//session_destroy();

print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/estilos_productos.css" rel="stylesheet">
</head>

<body class="bodypody">

    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="<?php echo BASE_URL . 'Views/pagina/productos.php' ?>" class="navbar-brand">
                    <strong>Productos</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a href="#" class="dropbtn">Categorias</a>
                                <div class="dropdown-content">
                                    <li><a href="Views/pagina/productos.php?cat=1">Accesorios de música</a></li>
                                    <li><a href="Views/pagina/productos.php?cat=2">Mochilas</a></li>
                                    <li><a href="Views/pagina/productos.php?cat=4">Cinturones</a></li>
                                    <li><a href="Views/pagina/productos.php?cat=3">Gorras</a></li>
                                    <li><a href="Views/pagina/productos.php?cat=5">Bolsas de regalos</a></li>
                                    <li><a href="Views/pagina/productos.php?cat=6">Articulos Electronicos</a></li>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a href="<?php echo BASE_URL . 'Views/pagina/checkout.php' ?>" class="btn btn-success">
                        Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span>
                    </a>
                </div>
            </div>
    </header>