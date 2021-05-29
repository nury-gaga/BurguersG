<?php
    include("conexion.php");
    $conexion = new mysqli($servidor, $usuario, $contraseña, $db);
    $sql_no_pedido = "SELECT id_pedido FROM pedido WHERE id_cliente = 3";
    $resultado_no_pedido = $conexion->query($sql_no_pedido);
    $id_pedido = $resultado_no_pedido->fetch_assoc();
    $id_p = $id_pedido['id_pedido'];
    if(isset($_POST['sencilla'])){
        $sql_id_burguer = "SELECT id_burguer FROM buergers WHERE especialidad = 'Sencilla'";
        $resultado_id_burguer = $conexion->query($sql_id_burguer);
        $id_burguer = $resultado_id_burguer->fetch_assoc();
        $id = $id_burguer['id_burguer'];
        $sql_id_costo = "SELECT costo FROM buergers WHERE especialidad = 'Sencilla'";
        $resultado_costo = $conexion->query($sql_id_costo);
        $costo = $resultado_costo->fetch_assoc();
        $total = $costo['costo'];
        $sql = "INSERT INTO pedido_burguer(no_pedido, id_burguer, total, cantidad) VALUES ($id_p, $id, $total, 1)";
        if ($conexion->query($sql) === true) {
            echo"insercion de datos correcto";
        }
        else{
            die("Conexión fallida" . $conexion->error);
        }
    }
    else{
        echo"no se logró";
    }
?>