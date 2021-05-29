<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet"type="text/css" href="static/css/quienes-somos.css">
</head>
<body>
    <div id="modal-content">
        <div id="link">
            <img src="static/img/logo5.png">
            BurguersG
            <sup>
                ©
            </sup>
            <a href="loggin.html" id="right">Iniciar sesion</a>
            <a href="registrar.html">Registrarse</a>
        </div>
        <div id="cent">
            <div id="link">
                <a href="index.html">Inicio</a>
                <a href="quienes-somos.html">Catalogo</a>
                <a href="pedidos.html">Pedidos</a>
            </div>
        </div>
    </div>
    <div>
        <div>
            <div class="modal-content">
                <form action="pedir.php" method="post">
                    <div id="grid-desktop">
                    <?php
                        
                    ?>
                        <div class="cupon-desktop" id="sencilla">
                            <input type="submit" value="Pedir" name="sencilla" class="btn">
                        </div>
                    </div>
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