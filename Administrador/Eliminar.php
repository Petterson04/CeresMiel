<?php
    include("base.php");
    $Id_Producto=$_GET['Id'];
    $Precio=$_GET['Precio'];
    $NombreProducto=$get['NombreProducto'];

    $sql=mysqli_query($conect,"DELETE FROM productos WHERE NombreProducto='$NombreProducto' OR Id_producto='$Id_Producto';");

    if($sql){
        header ("location: index.php");
    }else{
      header ("location: EliminarProducto.php");
    }


?>