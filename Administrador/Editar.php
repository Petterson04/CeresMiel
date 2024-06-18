<?php 
    include("base.php");
    $Id_Producto=$_POST['Id'];
    $NombreProducto=$_POST['NuevoNombre'];
    $Precio=$_POST['NuevoPrecio'];
    $Onzas=$_POST['NuevoOnzas'];
    $Imagen=$_POST['NuevoImagen'];

    $sql= mysqli_query($conect,"UPDATE productos SET NombreProducto='$NombreProducto', Precio='$Precio', Onzas='$Onzas', Imagen='$Imagen' WHERE Id_Producto='$Id_Producto';");
    if($sql){
        header("location:index.php");
        exit();
    }else{
        header("location:index.php");
    }

?>