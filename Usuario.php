<?php 
include("base.php" );
session_start();
if (isset($_SESSION['correo'])) {
    $correo=$_SESSION['correo'];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?php echo $correo ?></h1>
    
</body>
</html>