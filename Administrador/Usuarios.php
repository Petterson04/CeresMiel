<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href=".//css/Usuarios.css">
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
    
    
    <h1>
        Control de usuarios registrados
    </h1>
    <?php
        include ("base.php");
        $sql= mysqli_query($conect,"SELECT * FROM usuario");
        ?>
        
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>correo</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php
                    while($row = mysqli_fetch_array($sql)){?>
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['nombre'] ?></td>
                      <td><?php echo $row['correo'] ?></td>
                      <td><?php echo $row['telefono'] ?></td>
                      <td>
                        
                    </td>
                    </tr>
                    <?php }?>
                  </tbody>
            </table>

</body>
</html>