<?php

require '../../Config/conexion.php';

if(!empty($_GET["cat"])){
    $cat= $_GET["cat"];
}

$db= new Database();
$con = $db->conectar();

$sql= $con->prepare("SELECT id_producto, nombre, precio, descripcion, imagen FROM productos WHERE activo=1 AND tipo_categoria= $cat");
$sql-> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="<?php echo BASE_URL .  'Assets/css/productos.css'?>" rel="stylesheet">
</head>

<body class="bodypody">

    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Bolsas de regalo</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id_producto="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Catalogo</a>
                        </li>
                    </ul>
                    <a href="checkout.php" class="btn btn-success">
                        Carrito <span id_producto="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span>
                    </a>
                </div>
            </div>
    </header>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">

                        <?php

                        $id_producto= $row['id_producto'];
                        $imagen= $row['imagen'];

                        if (!file_exists("../../$imagen")) {
                            $imagen = "Assets/img/img1.jpg";
                        }
                    ?>
                        <div class="item">
                            <figure> <img src="<?php echo BASE_URL . $imagen; ?>"></figure>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre'];?></h5>
                            <p class="card-text">$<?php echo $row['precio'];?></p>
                            <p class="card-text"><?php echo $row['descripcion'];?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="details.php?id_producto=<?php echo $row['id_producto']; ?>&token=<?php echo
                                    hash_hmac('sha1', $row['id_producto'], KEY_TOKEN);?>" class="btn btn-primary">Detalles</a>
                                </div>
                                <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id_producto']; ?>, '<?php echo hash_hmac('sha1', $row['id_producto'],KEY_TOKEN); ?>')">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>>
            </div>
        </div>
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
        <h2 class="titulo-final">&copy; Juan Carlos Rodriguez | Equipo Integrador</h2>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <SCript>
    function addProducto(id_producto, token) {
        let url = 'clases/carrito.php'
        let formData = new FormData()
        formData.append('id_producto', id_producto)
        formData.append('token', token)

        fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
    }
    </SCript>


</body>

</html>