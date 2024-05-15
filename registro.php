<?php

    include "base.php";

    $nombre= $_POST['nombre'];
    $correo= $_POST['correo'];
    $contraseña= $_POST['contraseña'];
    $telefono= $_POST['telefono'];

    $sql = mysqli_query($conect,"INSERT INTO usuario(id,nombre,correo,contraseña,telefono)
    VALUES (0,'$nombre','$correo','$contraseña','$telefono')");
   
    if($sql){
        echo"usuario registrado";
        header ("location: index.php");
        exit;

    }else{
        echo"error al registrar";
    }

?>