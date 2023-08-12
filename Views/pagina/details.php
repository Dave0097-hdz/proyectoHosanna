<?php
require 'configuracion/config.php';
require 'configuracion/database.php';
$db= new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == ''){
    echo 'error al procesar la peticion';
    exit;
} else {

    $token_tmp = hash_hmac ('sha1', $id, KEY_TOKEN);
    
    if ($token == $token_tmp){

        $sql= $con->prepare("SELECT count(id) FROM prod_bolsas WHERE id=? and activo=1");
        $sql-> execute([$id]);
        if ($sql -> fetchColumn() > 0) {
            $sql= $con->prepare("SELECT nombre, descripcion, precio FROM prod_bolsas WHERE id=? and activo=1 limit 1");
            $sql-> execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
        }
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    } else {
        echo 'error al procesar la peticion';
        exit;
    }
}



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
    <link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
</head>

<body class="">

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

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Catalogo</a>
                        </li>
                    </ul>
                    <a href="Carrito.php" class="btn btn-success">
                        Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span>
                    </a>
                </div>
            </div>
    </header>
    <main>
        <div class="container">
        </div>
        <button class="btn btn-outline-success" type="button"
            onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar
            al carrito</button>
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
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

    <SCript>
    function addProducto(id, token) {
        let url = 'clases/carrito.php'
        let formData = new FormData()
        formData.append('id', id)
        formData.append('token', token)

        fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elemento = document.getElemenById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
    }
    </SCript>


</body>

</html>