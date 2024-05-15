<?php

$server="127.0.0.1"; 
$data="ceres";
$user="root";
$pass="";

$conect=mysqli_connect($server,$user,$pass,$data);

if(!$conect){
    die("falla en la conexion".mysqli_connect_error());
}else{
   

}


?>