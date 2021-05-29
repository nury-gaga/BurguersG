<?php
        include "conexion.php";
        session_start();
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
        if (isset($_SESSION['id'])) {
            header("location:index.php");
        }
        if ($_POST) {
            $correo = $_POST['correo'];
            $password = $_POST['contraseña'];
            $sql = "SELECT id_cliente, nombre, nombre_usuario, correo, password, rol FROM cliente WHERE correo = '$correo'";
            $re = $conexion->query($sql);
            $num = $re->num_rows;
            if($num > 0){
                $row = $re->fetch_assoc();
                $passwordbd = $row['password'];
                if($passwordbd == $password){
                    $_SESSION['id'] = $row['id_cliente'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['tipo_usuario'] = $row['rol'];
                    if ($_SESSION['tipo_usuario'] == 2) {
                        header("location: carrito.php");
                    }
                    else{
                        header("location:burguers.php");
                    }
                }
                else{
                    echo "La contraseña no coinside";
                }
            }
            else{
                echo"No existe el usuario";
            }
        }
    ?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Loggin</title>

<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Los iconos tipo Solid de Fontawesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<!-- Nuestro css-->
<link rel="stylesheet"type="text/css" href="static/css/loggin.css">
    </head>
<body>
    <div id="modal-content">
        <div id="link">
            <img src="static/img/logo5.png">
            BurguersG
            <sup>
                ©
            </sup>
                <a href='http://localhost/ProyectoPW/loggin.php' id='right'>Iniciar sesion</a>
                <a href='http://localhost/ProyectoPW/registrar.php' id='right'>Registrarse</a>
        </div>
    </div>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/userp.jpg"/>
                </div>
                <form method="post" action="loggin.php" class="col-12">
                <div class="form-group" id="user-group">
                        <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
                    </div>                            
                        <div class="form-group" id="contraseña-group">
                            <input type="password" name="contraseña" id="contraseña" class="form-control" placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i>Iniciar sesion</button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>