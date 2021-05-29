<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar burguer</title>
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
    <link rel="stylesheet"type="text/css" href="static/css/simpleSlider.min.css">
    <link rel="stylesheet"type="text/css" href="static/css/theme.min.css">
</head>
<body>
    <div id="modal-content">
        <div id="link">
            <img src="static/img/logo5.png">
            BurguersG
            <sup>
                ©
            </sup>
        </div>
        
    </div>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/logo5.png"/>
                </div>
                <form method="post" action="agregar.php" class="col-12">
                    <div class="form-group" id="">
                        <input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="Especialidad">
                    </div>                            
                    <div class="form-group" id="">
                        <input type="text" name="costo" id="costo" class="form-control" placeholder="Costo">
                    </div>
                    <div class="form-group" id="">
                        <input type="text" name="existente" id="existente" class="form-control" placeholder="Existente">
                    </div>
                    <div class="form-group" id="">
                        <input type="text" name="imagen" id="imagen" class="form-control" placeholder="Nombre de la imagen">
                    </div>
                    <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i>Añadir</button>
                </form>
            </div>
        </div>
    </div>
    
    
    <footer class="model-dialog text-center">
        <div class="modal-content">
            <div id="modal-content">
                BurguersG
                <sup>
                    ©
                </sup>
                <p>
                    TM &amp; © 2020 BurgersG Corporation. Todos los derechos reservados. C. San Carlos, Nueva California, 27083, Torreon Coah. Mexi.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
    if (isset($_POST['especialidad']) && !empty($_POST['especialidad']) && isset($_POST['costo']) && !empty($_POST['costo'])
    && isset($_POST['existente']) && !empty($_POST['existente']) && isset($_POST['imagen']) && !empty($_POST['imagen'])){
        include "conexion.php";
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
        //recuperar las variables
        $especialidad = $_POST['especialidad'];
        $costo = $_POST['costo'];
        $existente = $_POST['existente'];
        $imagen = $_POST['imagen'];
        //hacemos la sentencia de sql
        $sql="INSERT INTO buergers (especialidad, costo, existente, imagen) VALUES('$especialidad', '$costo', '$existente', '$imagen')";
        //ejecutamos la sentencia de sql
        $ejecutar=mysqli_query($conexion,$sql);
        //verificamos la ejecucion
        if(!$ejecutar){
            echo"Hubo Algun Error" . $sql . "<br>" . mysqli_error($conexion);
        }else{
            echo"Datos Guardados Correctamente<br>";
            header("location: burguers.php");
        }
    }
    else{
        echo"<h1>Ingrese todos los campos</h1>";
    }
?>