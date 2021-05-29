<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
    }
    $nombre = $_SESSION['nombre'];
?>
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

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Nuestro css-->
    <link rel="stylesheet"type="text/css" href="static/css/quienes-somos.css">
    <link rel="stylesheet"type="text/css" href="static/css/simpleSlider.min.css">
    <link rel="stylesheet"type="text/css" href="static/css/theme.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class=".dropdown-menus .dropdown-menus-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                        </div>
                    </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                
                <!-- Nav Item - Messages -->
                
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre; ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class=".dropdown-menu .dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="" href="loggout.php" data-toggle="" data-target="">
                        <i class=""></i>
                        Logout
                    </a>
                    </div>
                </li>

                </ul>
            </nav>
        </div>
        
    </div>
    <div>
        <div>
            <div class="modal-content">
                    <div id="grid-desktop">
                    <?php
                        include "conexion.php";
                        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
                        $query = "";
                        $re = $conexion->query("SELECT * FROM buergers WHERE id_burguer = ".$_GET['id']) or die ("no hay nada.");
                        while($f=mysqli_fetch_array($re)){
                    ?>
                        <div class="cupon-desktop">
                            <div class="user-img">
                            <center>
                                <img src="static/img/<?php echo$f['imagen']; ?>" alt="">
                                <span>
                                    <h1><?php echo$f['especialidad']; ?></h1>
                                </span><br>
                                <span>
                                    $ <?php echo$f['costo']; ?>
                                </span><br>
                            </div>
                            <!--<input type="submit" value="" name="sencilla" class="btn asd" style="top :0%">-->
                            <div id="link">
                                    <a href="carrito-compras.php?id=<?php echo $f['id_burguer'];?>">
                                        Añadir al carrito.
                                    </a>
                                </div>
                            </center>
                        </div>
                    <?php
                        }
                    ?>
                        
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