<?php
require '../templates/header.php';

$db= new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito= array();

if ($productos != null){
    foreach($productos as $clave => $cantidad) {


        $sql= $con->prepare("SELECT id_producto, nombre, precio, $cantidad as cantidad FROM productos WHERE id_producto=? AND activo=1");
        $sql-> execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}else {
    header("Location: productos.php");
    exit;
}
?>

<main>
<?php require '../../Controller/registro_ventas.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-8-edn">
                <h4>Deatalles de compra</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($lista_carrito== null){
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        } else {

                            $total = 0;
                            foreach($lista_carrito as $productos){
                                $_id = $productos ['id_producto'];
                                $nombre = $productos ['nombre'];
                                $precio = $productos ['precio'];
                                $cantidad = $productos ['cantidad'];
                                $descuento = 0;
                                $precio_desc = $precio - (($precio*$descuento)/100);
                                $subtotal = $cantidad * $precio_desc;
                                $total += $subtotal;
                            ?>

                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td>
                                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA .
                                number_format($subtotal,2,'.',',');?></div>
                                </td>
                            </tr>
                            <?php } ?>

                            <tr>
                                <td colspan="2">
                                    <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total,2,'.',','); ?></p>
                                </td>
                            </tr>

                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <form action="" method="post">
                <div class="row">
                    <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit" name="btnpedidos" id="btnpedidos" value="ok">Realizar pago</button>
                    </div>
                </div>
                </form>

            </div>
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

</body>

</html>