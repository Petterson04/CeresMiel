<?php
//Seguridad de sesssiones para esta pestaña
session_start();
error_reporting(0); 
$varsesion=$_SESSION['correo'];
if($varsesion== null|| $varsesion== ''){
    header('location: login.html');
    die();
}
?>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Id_Producto'])&& isset($_POST['Id_Boton'])){
    $Id_Producto=$_POST['Id_Producto'];
    $Id_Boton=$_POST['Id_Boton'];
}
//realizamos la consulta con la base de datos para obtener la informacion del producto
//Modificas el archivo de include y la variable del query de sql
include('base.php');
$sql=mysqli_query($conect,"SELECT*FROM productos WHERE Id_Producto='$Id_Producto'");
$producto=mysqli_fetch_array($sql);
//verificamos si el carro ya existe 
if(!isset($_SESSION['carrito'])) {
    $_SESSION['carrito']=array(); 
}
//verificamos si el producto ya se encuentra en el carro
if(isset($_SESSION['carrito'][$Id_Boton])) {
    $_SESSION['carrito'][$Id_Boton]['cantidad']++;
    $_SESSION['carrito'][$Id_Boton]['subtotal']==$_SESSION['carrito'][$Id_Boton]['Precio']**$_SESSION['carrito']['Id_Boton']['cantidad'];
}else{
    
    $producto_carrito=array(
        //aqui van a ir todas las variables de los productos del lado izquierdo el nombre que le quieras poner y del lado deerecho dentro de los [] van los nombres de la base de datos
        'id_prducto'=>$producto['Id_Producto'],
        'NombreProducto'=> $producto['NombreProducto'],
        'Onzas'=> $producto['Onzas'],
        'Precio'=> $producto['Precio'],
        'cantidad'=>1,
        'subtotal'=> $producto['Precio'],
    );
    $_SESSION['carrito'][$Id_Boton]=$producto_carrito;
}
echo"<pre>";
print_r($_SESSION['carrito']);
echo"</pre>";
header("Location: productos.php");
?>