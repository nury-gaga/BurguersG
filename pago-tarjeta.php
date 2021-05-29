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
    <title>Pago con tarjeta</title>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet"type="text/css" href="static/css/index.css">
    <link rel="stylesheet"type="text/css" href="static/css/simpleSlider.min.css">
    <link rel="stylesheet"type="text/css" href="static/css/theme.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type = "text/css" href ="static/css/COD.css">
    <link rel="stylesheet" type = "text/css" href ="static/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
    <div id="modal-content">
        <div id="link">
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

            <img src="static/img/logo5.png">
            BurguersG
            <sup>
                ©
            </sup>
        </div>
    </div>
    <div class="text-center">
        <div>
            <div class="">
                <div>
                    <div class="">
                    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted"> Tarjeta de credito o debito.</h5>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font"> Mes a Expirar</span>
                                <input type="text" class="form-control" placeholder="MM" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">  Año a Expirar</span>
                                <input type="text" class="form-control" placeholder="AA" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">  CCV</span>
                                <input type="text" class="form-control" placeholder="CCV" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3"><br>                               
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">

                                <input type="text" class="form-control" placeholder="Nombre del propietario" required="" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 pad-adjust">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked class="text-muted" required=""> Guardar detalles para pagos rápidos.<a href="#">Leer Más.</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                             <a href="carrito-compras.php"><input type="submit" class="btn btn-danger btn-block" value="CANCELAR" required="" /></a>   
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                              <a href="pago-exitoso.php"><input type="submit" class="btn btn-success btn-block" value="PAGAR AHORA" required="" /></a>  
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider -->
  <div class="simple-slider page-slider">
    <div class="slider-wrapper">
      <!-- Primer slide -->
      <div class="slider-slide" style="background-image:url('static/img/slider1.jpg');">        
        <span class="slider-number">1</span>
      </div>

      <!-- Second slide -->
      <div class="slider-slide" style="background-image:url('static/img/slider2.jpg');">
        <span class="slider-number">2</span>
      </div>

      <!-- Third slide -->
      <div class="slider-slide" style="background-image:url('static/img/slider3.jpg');">
        <span class="slider-number">3</span>
      </div>

      <!-- Fourth slide -->
      <div class="slider-slide is-bright" style="background-image:url('static/img/slider4.jpg');">
        <span class="slider-number">4</span>
      </div>
    </div>

    <!--Pagination (Not required)-->
    <div class="slider-pagination"></div>

    <!-- Buttons (Not required) -->
    <div class="slider-btn slider-btn-prev"></div>
    <div class="slider-btn slider-btn-next"></div> 
  </div>
  <!-- /Slider -->
<!-- </div>  -->

<script src="js/simpleSlider.min.js"></script>
<script>
  var slider = new SimpleSlider('.page-slider',{
    //Transicion entre diapositivas en ms
    speed:600,
    //Retardo de la transici�n entre diapositivas en ms
    delay:5000,
    autoplay:true,
    loop:true
    });
</script>
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