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
    <title>EliminarProducto</title>
    <link rel="stylesheet" href="css/EliminarProducto.css">

</head>
<body>
    <header>
    <nav id="Navegacion" >
            <a href="index.php">Administrador</a>
            <a href="EditarProductos.php"> Editar Productos</a>
            <a href="EliminarProducto.php">Eliminar Productos</a>
            <a href="BuscarProducto.php">Buscar Productos</a>
            <a href="Cerrar_sesion.php">Cerrar Sesion</a>
        </nav>
    </header>
    <h1>Eliminar productos</h1>
    <section>
    <form class="Formulario" method="get" action="Eliminar.php">
        <div>
            <div class="FORM">
                <input name="NombreProducto"  type="text" placeholder="NombreProducto">
            </div>
            <div>
                <input name="Id" type="number" placeholder="Id del producto">
            </div>
            <div>
                <input name="Precio" type="text" placeholder="Precio">
                
            </div>
            <div class="Enviar">
                <input type="submit" value="Eliminar">
           
    </form>
    </section>
   
    <footer>
        <P class="REDES SOCIALES">Intagram</P>
        <p class="REDES SOCIALES">FACEBOOK</p>
        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, sit voluptatem? Nulla, eveniet quibusdam. Voluptatum voluptatem eos sapiente quae molestiae quia alias, corporis ullam. Aut eos accusantium facere quas soluta!</P>
    </footer>

</body>
</html>