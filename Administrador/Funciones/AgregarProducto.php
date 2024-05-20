<?php

    include "base.php";
    $Id_Producto=$_POST['Id_Producto'];
    $NombreProducto= $_POST['NombreProducto'];
    $Precio= $_POST['Precio'];
    $Cantidad =$_POST['Onzas'];
    $Imagen= $_POST['Imagen'];
   
    $sql = mysqli_query($conect,"INSERT INTO productos(Id_Producto,NombreProducto,Precio,Onzas,Imagen)
        VALUES (0,'$NombreProducto','$Precio','$Cantidad','$Imagen')");
    
    if($sql){
        echo"Producto registrado";
        header ("location:./index.php");
        exit;

    }else{
        echo"error al registrar";
    }

?>