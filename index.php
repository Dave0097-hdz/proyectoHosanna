<?php 
require_once "Config/conexion.php";
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/styles.css">
</head>

<body>
    <header>
        <nav>
            <nav>
                <a href="index.php">Inicio</a>
                
                <?php

                if (isset($_SESSION['nombre'])){ 
                    echo "<a href='Views/cliente/perfil.php'>Perfil</a>";
                    }
                ?>
                <a href="<?php echo BASE_URL . 'Views/public/iniciar.php' ?>">Iniciar Sesion</a>
                <a href="Views/pagina/productos.php" >Productos</a>
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
                <a href="#">Servicio</a>
                <a href="Views/admin/index.php">Acceder</a>
            </nav>
        </nav>
        <section class="textos-header">
            <h1>HOSSANA</h1>
            <h2>Comodidad y Novedades en un solo lugar</h2>
            <div class="header-logo">
                <img class="logo-hossana" src="<?php echo BASE_URL . 'Assets/img/Logo_Hosanna.png' ?>" />
            </div>
        </section>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestro producto</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="<?php echo BASE_URL . 'Assets/img/ilustracion2.svg' ?>" class="imagen-about-us" />
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
                        veniam eius aspernatur ad consequuntur aperiam minima sed dicta
                        odit numquam sapiente quam eum, architecto animi pariatur, velit
                        doloribus laboriosam ut.
                    </p>
                    <h3><span>2</span>Calidad y Precio</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
                        veniam eius aspernatur ad consequuntur aperiam minima sed dicta
                        odit numquam sapiente quam eum, architecto animi pariatur, velit
                        doloribus laboriosam ut.
                    </p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Portafolio</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img1.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img2.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img3.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img4.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img5.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img6.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img7.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="<?php echo BASE_URL . 'Assets/img/img8.jpg' ?>" alt="" />
                        <div class="hover-galeria">
                            <img src="<?php echo BASE_URL . 'Assets/img/icono1.png' ?>" alt="" />
                            <p>Nuestros productos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="<?php echo BASE_URL . 'Assets/img/face1.jpg' ?>" alt="" />
                    <div class="contenido-texto-card">
                        <h4>Name</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae,
                            sapiente!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo BASE_URL . 'Assets/img/face2.jpg' ?>" alt="" />
                    <div class="contenido-texto-card">
                        <h4>Name</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae,
                            sapiente!
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Nuestros servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="<?php echo BASE_URL . 'Assets/img/ilustracion1.svg' ?>" alt="" />
                        <h3>Name</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore,
                            qui?
                        </p>
                    </div>
                    <div class="servicio-ind">
                        <img src="<?php echo BASE_URL . 'Assets/img/ilustracion4.svg' ?>" alt="" />
                        <h3>Name</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore,
                            qui?
                        </p>
                    </div>
                    <div class="servicio-ind">
                        <img src="<?php echo BASE_URL . 'Assets/img/ilustracion3.svg' ?>" alt="" />
                        <h3>Name</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore,
                            qui?
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>9323296789</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>dave087hdz@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>5ta Ponienete S/N Barrio Centro - Rayon, Chiapas</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; David Hernandez | Equipo Integrador</h2>
    </footer>
</body>

</html>