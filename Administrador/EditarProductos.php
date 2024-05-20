<?php
//Seguridad de sesssiones para esta pestaña
session_start();
error_reporting(0); 
$varsesion=$_SESSION['correo']=='Admin@gmail.com';
if($varsesion== null|| $varsesion== ''){
    header('location:../login.html');
    die();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="./css/EditarProducto.css">
</head>
<header>
        <nav id="Navegacion" >
            <a href="index.php">Administrador</a>
            <a href="EditarProductos.php"> Editar Productos</a>
            <a href="BuscarProducto.php">Buscar Productos</a>
            <a href="Usuarios.php"> Usuarios</a>
            <a href="Cerrar_sesion.php">Cerrar Sesion</a>
            
        </nav>
    </header>
<body>
    
    <fieldset>
    
    <form action="./Funciones/Editar.php" method="post">    
        <div>
            <input type="number" name="Id" placeholder="Id producto a modificar">
        </div>       
        <div>
            <input type="text" name="NuevoNombre" placeholder="Nuevo Nombre">
        </div>
        <div>
            <input type="number"   name="NuevoPrecio" placeholder="Nuevo Precio">
        </div>
        <div>
        <input type="number" name="NuevoOnzas" placeholder="Onzas">
        </div>
        <div>
            <input type="url" name="NuevoImagen" placeholder="Nueva imagen">
        </div>
        <div>
            <input class="Boton" type="submit" value="Editar">
        </div>
            
    </form>
</div>
    </fieldset>
    
</body>
</html>