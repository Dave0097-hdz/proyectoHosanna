<?php
require '../templates/header.php';

$db= new Database();
$con = $db->conectar();

if(!empty($_GET["cat"])){
    $cat= $_GET["cat"];
    $sql= $con->prepare("SELECT id_producto, nombre, precio, descripcion, imagen FROM productos WHERE activo=1 AND tipo_categoria= $cat");
    $sql-> execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}else {
    $sql= $con->prepare("SELECT id_producto, nombre, precio, descripcion, imagen FROM productos WHERE activo=1 ");
    $sql-> execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    
}



?>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">

                        <?php

                    $id= $row['id_producto'];
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
                                    <a href="details.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo
                                    hash_hmac('sha1', $row['id_producto'], KEY_TOKEN);?>" class="btn btn-primary">Detalles</a>
                                </div>
                                <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id_producto']; ?>, '<?php echo hash_hmac('sha1', $row['id_producto'],KEY_TOKEN); ?>')">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
    }
    </SCript>


</body>

</html>