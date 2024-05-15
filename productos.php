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

