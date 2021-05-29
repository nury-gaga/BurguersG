<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
    }
    $nombre = $_SESSION['nombre'];
?>
<?php
    if (isset($_POST['correo']) && !empty($_POST['correo'])){
        include "conexion.php";
        $correoo = $_POST['correo'];
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
        $consulta = "SELECT id_cliente FROM cliente WHERE correo = '$correoo'";
        $recons = $conexion->query($consulta);
        $num = $recons->num_rows;
        if ($num > 0) {
            $row = $recons->fetch_assoc();
            $iddb = $row['id_cliente'];
            $sql="UPDATE cliente SET rol = 1 WHERE cliente.id_cliente = '$iddb'";
            //ejecutamos la sentencia de sql
            $ejecutar=mysqli_query($conexion,$sql);
            //verificamos la ejecucion
            if(!$ejecutar){
                echo"Hubo Algun Error" . $sql . "<br>" . mysqli_error($conexion);
            }else{
                echo"Datos Guardados Correctamente<br>";
                header("location:burguers.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
    <link rel="stylesheet"type="text/css" href="static/css/simpleSlider.min.css">
    <link rel="stylesheet"type="text/css" href="static/css/loggin.css">
    <!-- Custom fonts for this template-->
    <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">-->

    <!-- Custom styles for this template-->
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
                <div id="cent">
            <div id="link">
                <a href="http://localhost/ProyectoPW/burguers.php">Burguers</a>
                <a href="http://localhost/ProyectoPW/usuarios.php">Usuarios</a>
                <a href="http://localhost/ProyectoPW/admin.php">Ventas</a>
            </div>
        </div>
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
            <div class="modal-dialog text-center">
                <div class="col-sm-8 main-section">
                    <div class="modal-content">
                        <div class="col-12 user-img">
                            <img src="static/img/userp.jpg"/>
                        </div>
                        <form method="post" action="usuarios.php" class="col-12">
                            <div class="form-group" id="user-group">
                                <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
                            </div>
                            <button type="submit" class="btn-light"><i class="fas fa-sign-in-alt"></i>Hacer administrador</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-content">
                    <div id="grid-desktop">
                    <?php
                        include "conexion.php";
                        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
                        $query = "";
                        $re = $conexion->query("SELECT nombre, correo FROM cliente");
                        while($f=mysqli_fetch_array($re)){
                    ?>
                        <div id="burguers" class="cupon-desktop">
                            <div class="user-img">
                                <img src="static/img/userp.jpg" alt="">
                            </div>
                            <!--<input type="submit" value="" name="sencilla" class="btn asd" style="top :0%">-->
                            <p>
                                <?php echo $f['nombre']; ?>
                            </p>
                            <p>
                                <?php echo $f['correo']; ?>
                            </p>
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
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
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
