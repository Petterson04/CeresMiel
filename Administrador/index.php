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
    <title>Administrador</title>
    <link rel="stylesheet" href=".//css/Agregarproducto.css">
</head>
<body><header>
        <nav id="Navegacion" >
            <a href="index.php">Administrador</a>
            <a href="EditarProductos.php"> Editar Productos</a>
            <a href="BuscarProducto.php">Buscar Productos</a>
            <a href="Usuarios.php"> Usuarios</a>
            <a href="Cerrar_sesion.php">Cerrar Sesion</a>
            
        </nav>
    </header>
    <h1>Registrar productos</h1>
    <section>
            <fieldset>
                <form class="Formulario" method="post" action="AgregarProducto.php">
                    <div class="FORM">
                        <div class="Txt">
                            <input name="NombreProducto" type="text" placeholder="Nombredelproducto">
                        </div>
                        <div class="Txt">
                            <input name="Precio"  type="number" placeholder="Precio">
                        </div>
                        <div class="Txt">
                            <input name="Onzas" type="number" placeholder="Onzas">
                        </div>
                        <div class="Txt">
                            <input name="Imagen" type="url" placeholder="Imagen">
                        </div>
                        <div class="Enviar">
                            <input type="submit" value="Agregar">
                        </div>
                    </div>
                </form>
    </section>
    <main>
    <div class="Container">
        <?php
        include ("base.php");
        $sql= mysqli_query($conect,"SELECT * FROM productos");
        ?>
        
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
                        <form action="Eliminar.php" method="post" class="Eliminar_Producto">
                            <input type="hidden" name="Id_Producto" value="<?php echo $row['Id_Producto']?>">
                            <input type="hidden" name="Id_Boton" value="boton_<?php echo $row['Id_Producto']?>">
                            <button type="submit" class="buttonDelete">Eliminar</button>
                         </form>

                    </td>
                    </tr>
                    <?php }?>
                  </tbody>
            </table>
    
     
    </div>
</main>
</body>
</html>