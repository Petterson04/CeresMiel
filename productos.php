<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link href="./css/Productos.css" rel="stylesheet">
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
                    <p class="id_producto"><?php echo $row['Id_Producto']?></p>
                    <img class="producto__imagen" src="<?php echo $row['Imagen'] ?>" >
                        <div class="producto__informacion">
                            <p class="producto__nombre">Jarabe de agave sabor <?php echo $row['NombreProducto'] ?></p>
                           <p class="producto__nombre"> <?php echo $row['Onzas'] ?>(oz)</p>
                            <p class="producto__precio">$<?php echo $row['Precio'] ?></p>
                        </div>
                        <form action="agregar_carrito.php" method="post" class="agregar-carro">
                    <input type="hidden" name="Id_Producto" value="<?php echo $row['Id_Producto']?>">
                    <input type="hidden" name="Id_Boton" value="boton_<?php echo $row['Id_Producto']?>">
                    <button type="submit" class="agregar-carrito">Agregar al carrito</button>
                </form>
                </div>
            <?php 
            } //cerramos las llaves del while ?>
        </div>
    </main>
</body>
</html>

