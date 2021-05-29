<?php
    session_start();
    include"conexion.php";
    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
    if ($_SESSION['carrito-compras']) {
        $arreglo = $_SESSION['carrito-compras'];
        for ($i=0; $i < count($arreglo); $i++) { 
            $id = $arreglo[$i]['Id'];
            $sql = "SELECT existente FROM buergers WHERE id_burguer = '$id'";
            $re = $conexion->query($sql);
            $num = $re->num_rows;
            if ($num > 0) {
                $row = $re->fetch_assoc();
                $existente = $row['existente'];
                $existente = ($existente - $arreglo[$i]['Cantidad']);
                $mod = "UPDATE buergers SET existente = '$existente' WHERE buergers.id_burguer = '$id'";
                $ejecutar=$conexion->query($mod);
                //verificamos la ejecucion
                if(!$ejecutar){
                    echo"Hubo Algun Error" . $sql . "<br>" . mysqli_error($conexion);
                }else{
                    echo"Datos Guardados Correctamente<br>";
                }
            }
        }
    }
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
      echo"Datos Guardados Correctamente<br>";
    }
    unset($_SESSION['carrito-compras']);
    header("location:index.php");
?>