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