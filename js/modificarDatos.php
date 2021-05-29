<?php
    session_start();
    
    $arreglo = $_SESSION['carrito-compras'];
    $total = 0;
    $numero = 0;
    for ($i=0; $i < count($arreglo); $i++) { 
        if ($arreglo[$i]['Id']==$_POST['Id']) {
            $numero = $i;
        }
    } 
    $arreglo[$numero]['Cantidad']=$_POST['Cantidad']; 
    for ($i=0; $i < count($arreglo); $i++) { 
        $total = ($arreglo[$i]['Costo']*$arreglo[$i]['Cantidad']) + $total;
    }
    $_SESSION['carrito-compras']=$arreglo;
    echo $total;
?>