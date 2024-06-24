<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link href="./css/Productos.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/Carrito.css">
</head>
<body>
    <header>
    <div class="Perfil">
            <?php
                include("base.php");
                session_start();
                if (isset($_SESSION['correo'])) {
                    $correo=$_SESSION['correo'];
                    echo $correo;
                } else {
                    echo '';
                }
            ?>
        </div>
        <nav id="Navegacion" >

            
            <a href="index.php">Pagina Principal</a>
            <a href="productos.php">productos</a>
            <?php if(isset($_SESSION['correo'])): ?>
            <a href="./Administrador/Cerrar_sesion.php">Cerrrar sesion</a>
            <a href="Carrito.php">Carrito</a>    
            <?php else:?>
            <a href="login.html"> Login</a>
            <a href="Registro.html">Registro</a>
           
            <?Php endif;?>
            
        </nav>
    </header>

    <section>
        <h1>Nuestros Productos</h1>
    </section>

    <main class="contenedor">
        <div class="grid">

        <?php 
            include("base.php");

            $sql = mysqli_query($conect, "SELECT * FROM productos;");

            while($row = mysqli_fetch_array($sql))
            {
                //cerramos para mostrar los productos ?>
            
                <div class="producto">
                    
                    <img class="producto__imagen" src="<?php echo $row['Imagen'] ?>" >
                        <div class="producto__informacion">
                            <p class="producto__nombre">Jarabe de agave sabor <?php echo $row['NombreProducto'] ?></p>
                           <p class="producto__nombre"> <?php echo $row['Onzas'] ?>(oz)</p>
                            <p class="producto__precio">$<?php echo $row['Precio'] ?></p>
                        </div>

                        <button class="agregar-carrito" data-product-id="<?php echo $row['Id_Producto']?>" >Agregar al carrito</button>
                
                </div>
            <?php 
            } //cerramos las llaves del while ?>
        </div>
        <table>
        <thead>
            <tr>
                
                <th>Producto</th>
                <th>Onzas</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Modificaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('base.php');
                $total = 0; // Inicializamos el total en 0
                if (isset($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $Id_Producto => $producto) {
                        //Estos son los datos que va a imprimir en la tabla el $producto[] debe de ser igual a como lo pusiste en el de agregar carrito
                        echo "<tr>";
                        echo "<td>Jarabe de miel sabor{$producto['NombreProducto']}</td>";
                        echo "<td>{$producto['Onzas']}</td>";
                        echo "<td>$ {$producto['Precio']}</td>";
                        echo "<td>{$producto['cantidad']}</td>";
                        echo "<td>$ {$producto['subtotal']}</td>";
                        echo "<td>";
                        ?>
                        <section class="modificar">
                            <?php 
                        echo "<a href='Modificarcarrito.php?action=add&id={$Id_Producto}'>+<i class='fa-solid fa-plus'></i></a> ";
                        echo "<a href='Modificarcarrito.php?action=remove&id={$Id_Producto}' >-<i class='fa-solid fa-minus'></i></a> ";
                        echo "<a href='Modificarcarrito.php?action=delete&id={$Id_Producto}' >borrar<i class='fa-solid fa-trash'></i></a>";
                        ?>
                        </section>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                        $total += $producto['subtotal']; // Sumamos al total el subtotal de cada producto
                    }
                } else {
                    echo "<tr><td colspan='5'>El carrito está vacío</td></tr>";
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>$ <?php echo $total; ?></strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="botonpagar">
    <a href="PDF.php" class="btn-pdf">Pagar<i class="fa-solid fa-file-pdf"></i></a>
</div>
    </main>
    <footer>
    <p>Encuentranos en nuestras redes sociales</p>
    <a href="https://www.instagram.com/ceres.mieles?igsh=cDdhNzVpa2IxbHo5&utm_source=qr">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
  <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
  <path d="M16.5 7.5l0 .01" />
</svg>
    </a>

    <a href="https://www.tiktok.com/@ceres.mieles?_t=8mNf53OUnQ5&_r=1">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tiktok" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z" />
</svg>
    </a>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');

        agregarCarritoBtns.forEach(btn => {
            btn.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = btn.getAttribute('data-product-id');
                agregarAlCarrito(productId);
            });
        });

        function agregarAlCarrito(productId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'agregar_carrito.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    location.reload();
                    console.log(productId)
                } else {
                    console.error('Error al agregar al carrito:', xhr.status);
                }
            };
            xhr.send(`Id_Producto=${productId}`);
            
        }
    });
</script>

</body>
</html>

