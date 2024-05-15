
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
</body>
</html>