<?php
require '../templates/header.php';

if(!empty($_GET["cat"])){
    $cat= $_GET["cat"];
}

$db= new Database();
$con = $db->conectar();

$sql= $con->prepare("SELECT id_producto, nombre, precio, descripcion, imagen FROM productos WHERE activo=1 AND tipo_categoria= $cat");
$sql-> execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


//session_destroy();

//print_r($_SESSION);

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
    <?php
require '../templates/footer.php';
?>
