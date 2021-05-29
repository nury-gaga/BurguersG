<?php
    include("conexion.php");
    
    $conexion = new mysqli($servidor, $usuario, $contraseña, $db);
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['contraseña']) && !empty($_POST['contraseña']) ) {
        $sql = "SELECT id_cliente FROM cliente WHERE nombre = '$_POST[nombre]' AND password = '$_POST[contraseña]'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $columna = $resultado->fetch_assoc();
            $id_cliente = $columna['id_cliente'];
            echo $id_cliente;
            $pedido="INSERT INTO pedido(tipo_pedido, entregado, id_cliente) VALUES (1, false, $id_cliente)";
            if ($conexion->query($pedido) === true) {
                "se ingreso su pedido";
            } else {
                "no se ingreso su pedido";
            }
            
        } else {
            die("Conexión fallida" . $conexion->error);
        }
    }
    else{
        echo"ingrese todos los datos";
    }
?>