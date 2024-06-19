<?php

include "base.php";
if (!$conect) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$triggers = [
    'after_insert_product' => "
        CREATE TRIGGER IF NOT EXISTS after_insert_product
        AFTER INSERT ON productos
        FOR EACH ROW
        BEGIN
            INSERT INTO bitacora (Usuario,Sentencia,consulta)
            VALUES (USER(),
                'Insert',
                CONCAT('INSERT INTO productos (Id_Producto, NombreProducto, Precio, Onzas, Imagen) VALUES (', NEW.Id_Producto, ', \"', NEW.NombreProducto, '\", \"', NEW.Precio, '\", \"', NEW.Onzas, '\", ', NEW.Imagen, '\")'));
        END;
    ",
    'after_update_product' => "
        CREATE TRIGGER IF NOT EXISTS after_update_product
        AFTER UPDATE ON productos
        FOR EACH ROW
        BEGIN
           INSERT INTO bitacora (Usuario,Sentencia,consulta)
            VALUES ( USER(),
            'Update',
            CONCAT('UPDATE productos SET NombreProducto = \"', NEW.NombreProducto, '\", Precio = \"', NEW.Precio, '\", Onzas = \"', NEW.Onzas, '\", Imagen = ', NEW.Imagen,'\" WHERE Id = ', NEW.Id_Producto)
            );
        END;
    ",
    'after_delete_product' => "
        CREATE TRIGGER IF NOT EXISTS after_delete_product
        AFTER DELETE ON productos
        FOR EACH ROW
        BEGIN
            INSERT INTO bitacora (Usuario,Sentencia,consulta)
            VALUES ( USER(),
            'Delete' ,
            CONCAT('DELETE FROM productos WHERE Id_Producto = ', OLD.Id_Producto)
            );
        END;
    "
];


foreach ($triggers as $trigger) {
    if (!mysqli_query($conect, $trigger)) {
        die("Error al crear el trigger: " . mysqli_error($conect));
    }
}

//Seguridad de sesssiones para esta pestaña
session_start();
error_reporting(0); 
$varsesion=$_SESSION['correo']=='Admin@gmail.com';
if($varsesion== null|| $varsesion== ''){
    header('location:../login.html');
    die();
}
$query= "SELECT * FROM bitacora";
$result=mysqli_query($conect,$query);

if(!$result){
    die("Error en la consulta");
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
    <h1>BITACORA DE CAMBIOS</h1>
    <main>
    <div class="Container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Sentencia</th>
                        <th>consulta</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)){?>
                    <tr>
                      <td><?php echo $row['Id'] ?></td>
                      <td><?php echo $row['Usuario'] ?></td>
                      <td><?php echo $row['fecha'] ?></td>
                      <td><?php echo $row['Sentencia'] ?></td>
                      <td><?php echo $row['consulta'] ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
            </table>
    
     
    </div>
</main>
</body>
</html>
