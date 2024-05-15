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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Producto</title>
    <link rel="stylesheet" href="css/Buscar.css">
</head>
<body>
<header>
        <nav id="Navegacion" >
            <a href="index.php">Administrador</a>
            <a href="EditarProductos.php"> Editar Productos</a>
            <a href="BuscarProducto.php">Buscar Productos</a>
            <a href="Usuarios.php"> Usuarios</a>
            <a href="Cerrar_sesion.php">Cerrar Sesion</a>
            
        </nav>
    </header>
        <?php
    include("base.php");

    $Id_Producto=$_GET['Id'];
    $NombreProducto=$_GET['Nombre'];
    $sql=mysqli_query($conect,"SELECT*FROM productos WHERE Id_producto='$Id_Producto' OR NombreProducto='$NombreProducto'");
   ?>
    <section>
        <fieldset>
            <form action="BuscarProducto.php" method="get">
                <div>
                    <input name="Id" type="number" placeholder="Id del producto">   
                </div>
                <div>
                <input type="text" name="Nombre" placeholder="Sabor a Buscar">
                </div>
                <div>
                    <input type="submit" value="Buscar">
                </div>
            </form>
        </fieldset>
    </section>

    <table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>precio</th>
            <th>Onzas</th>
            <th>Imagen</th>
        </tr>
    </thead>
     <tbody>
        <?php
        while($row = mysqli_fetch_array($sql)){?>
        <tr>
          <td><?php echo $row['Id_Producto'] ?></td>
          <td><?php echo $row['NombreProducto'] ?></td>
          <td><?php echo $row['Precio'] ?></td>
          <td><?php echo $row['Onzas'] ?></td>
          <td><?php echo $row['Imagen'] ?></td>
          <td>
            <a href="EditarProductos.php"> 
               <button class="editar" >Editar</button>
            </a>

            <a href="EliminarProducto.php">
                <button class="eliminar" >Eliminar</button>
            </a>
        </td>
        </tr>
        <?php }?>
      </tbody>
</table>

</body>
</html>