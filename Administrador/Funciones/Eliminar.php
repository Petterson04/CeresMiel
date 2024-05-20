<?php
    include("base.php");
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Id_Producto'])&& isset($_POST['Id_Boton'])){
      $Id_Producto=$_POST['Id_Producto'];
  }
    
    $sql=mysqli_query($conect,"DELETE FROM productos WHERE Id_producto='$Id_Producto';");

    if($sql){
        header ("location: index.php");
    }else{
      header ("location: EliminarProducto.php");
    }


?>