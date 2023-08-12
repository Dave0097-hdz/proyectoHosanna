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
}
?>

<main>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
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
                        <td><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?></td>
                        <td>
                            <input type="number" min="1" max="10" step="1" value="<?php echo
                                $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>"
                                onchange="actualizaCantidad(this.value, <?php echo $_id;?>)">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA .
                                number_format($subtotal,2,'.',',');?></div>
                        </td>
                        <td> <a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo
                            $_id;?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">eliminar</a></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">
                            <p class="h3" id="total"><?php echo MONEDA . number_format($total,2,'.',','); ?></p>
                        </td>
                    </tr>

                </tbody>
                <?php } ?>
            </table>
        </div>

        <?php if ($lista_carrito != null){?>
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <a href="<?php echo BASE_URL . '/Views/pagina/pago.php' ?>" class="btn btn-primary btn-lg">Continuar</a>
            </div>
        </div>
        <?php } ?>

    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminaModalLabel">Alerta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea quitar el Producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
            </div>
        </div>
    </div>
</div>
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
let eliminaModal = document.getElementById('eliminaModal')
eliminaModal.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
    buttonElimina.value = id
})

function actualizaCantidad(cantidad, id) {
    let url = 'clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action', 'agregar')
    formData.append('id', id)
    formData.append('cantidad', cantidad)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {

                let divsubtotal = document.getElementById('subtotal_' + id)
                divsubtotal.innerHTML = data.sub


                let total = 0.00
                let list = document.getElementsByName('subtotal[]')

                for (let i = 0; i < list.length; i++) {
                    total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                }

                total = new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 2
                }).format(total)
                document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
            }
        })
}

function eliminar() {
    let botonElimina = document.getElementById('btn-elimina')
    let id = botonElimina.value

    let url = 'clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action', 'eliminar')
    formData.append('id', id)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                location.reload()

            }
        })
}
</SCript>


</body>

</html>