<?php

require '../Config/config.php';
require '../Config/conexion.php';
$db= new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

print_r($_SESSION);

$lista_carrito= array();

if ($productos != null){
    foreach($productos as $clave => $cantidad) {


        $sql= $con->prepare("SELECT id, nombre, precio, descuento, $cantidad as cantidad FROM prod_bolsas WHERE id=? AND activo=1");
        $sql-> execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

//session_destroy();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/productos.css" rel="stylesheet">
</head>

<body class="">

    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <strong>Principal</strong>
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
                    <a href="checkout.php" class="btn btn-success">
                        Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span>
                    </a>
                </div>
            </div>
    </header>
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
                                $_id = $productos ['id'];
                                $nombre = $productos ['nombre'];
                                $precio = $productos ['precio'];
                                $cantidad = $productos ['cantidad'];
                                $descuento = $productos ['id'];
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

            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <button class="btn btn-primary btn-lg">Realizar pago</button>
                </div>
            </div>

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