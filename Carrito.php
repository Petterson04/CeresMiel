
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Carrito.css">
    <title>Document</title>
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
        <nav id="Navegacion" class="contenedor">

            
            <a href="index.php">Pagina Principal</a>
            <a href="productos.php">productos</a>
            <?php if(isset($_SESSION['correo'])): ?>
            <a href="./Administrador/Cerrar_sesion.php">Cerrrar sesion</a>
            <?php else:?>
            <a href="login.html"> Login</a>
            <a href="Registro.html">Registro</a>
           
            <?Php endif;?>
            
        </nav>
    </header>
    <h2>Carrito de Compras</h2>
    <div class="table-container">
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
                    foreach ($_SESSION['carrito'] as $Id_Boton => $producto) {
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
                        echo "<a href='Modificarcarrito.php?action=add&id={$Id_Boton}'>+<i class='fa-solid fa-plus'></i></a> ";
                        echo "<a href='Modificarcarrito.php?action=remove&id={$Id_Boton}' >-<i class='fa-solid fa-minus'></i></a> ";
                        echo "<a href='Modificarcarrito.php?action=delete&id={$Id_Boton}' >borrar<i class='fa-solid fa-trash'></i></a>";
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
</body>
</html>