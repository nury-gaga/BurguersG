<?php
session_start();
include "conexion.php";
  $arreglo=$_SESSION['carrito-compras'];
  $numeroventa=0;
  $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db) or die ("no hay conexion");
  $sql = "SELECT * FROM compras order by numeroventa DESC limit 1";
  $re = $conexion->query($sql);

  //$re = $conexion->query("SELECT * FROM compras order by numeroventa DESC limit 1") or die ("no hay nada.");
  //$re=mysqli_query($conexion,"select * from compras order by numeroventa DESC limit 1") or die (mysqli_error(""));
  //$re=mysql_query("select * from comprasp order by numeroventa DESC limit 1") or die(mysql_error()); 
  while ( $f=mysqli_fetch_array($re)) {
     $numeroventa=$f['numeroventa']; 
  }
  if($numeroventa==0){
   $numeroventa=1;
  }else{
   $numeroventa=$numeroventa+1;
  }
  for($i=0; $i<count($arreglo);$i++){
    $rs = mysqli_query($conexion,"insert into compras (numeroventa, imagen,nombre,costo,cantidad,subtotal) values(
    ".$numeroventa.",
    '".$arreglo[$i]['Imagen']."',
    '".$arreglo[$i]['Especialidad']."', 
    '".$arreglo[$i]['Costo']."',
    '".$arreglo[$i]['Cantidad']."',
    '".($arreglo[$i]['Costo']*$arreglo[$i]['Cantidad'])."'
    )")or die(mysqli_error($conexion));
  }
  unset($_SESSION['carrito-compras']);
  header("Location:admin.php");

?>