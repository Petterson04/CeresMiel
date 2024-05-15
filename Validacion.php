<?php 
    include("base.php");
    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];
    session_start();
    $_SESSION['correo']=$correo;
    

    $cosulta="SELECT*FROM usuario WHERE correo='$correo' and contraseña='$contraseña'";
    $resultado=mysqli_query($conect,$cosulta);

    $filas=mysqli_fetch_array($resultado);
    if($filas['correo']=='Admin@gmail.com'){
        header ("location:Administrador/index.php");}
        else{
        header("location:index.php");
    }
    if($filas== null){
        header ("location:login.html");
        session_destroy();
    }
    
    mysqli_free_result($resultado);
    mysqli_close($conect);
?>
