<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("location:index.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de usuarios</title>

<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Los iconos tipo Solid de Fontawesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<!-- Nuestro css-->
<link rel="stylesheet"type="text/css" href="static/css/registrar.css">
    </head>
<body>
    <div id="modal-content">
        <div id = "link">
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
                <form class="col-12 formulario" name = "formulario" action = "registrar.php" method="POST">
                    <div class="form-group" id="name-group">
                        <input type="text" name="nombre" maxlength= “10” onpaste=“return false” class="form-control" placeholder="Nombre(s)"/>
                    </div>
                    <div class="form-group" id="lastName-group">
                        <input type="text" name="apellidos" maxlength= “10” onpaste=“return false” class="form-control" placeholder="Apellidos"/>
                    </div>
                    <div class="form-group" id="user-group">
                        <input type="text" name="nombre_usuario" onpaste=“return false” class="form-control" placeholder="Nombre de usuario"/>
                    </div>
                    <div class="form-group" id="correo-group">
                        <input type="text" name="correo" onpaste=“return false” class="form-control" placeholder="Correo electronico"/>
                    </div>
                    <div class="form-group" id="contraseña-group">
                        <input type="password" name="contraseña" onpaste=“return false” class="form-control" placeholder="Contraseña"/>
                    </div>      
                    <button type="submit" class="btn btn-light" onClick = "validar(event)"><i class="fas fa-sign-in-alt"></i> Registrarme </button>
                </form>
                <?php
                    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['contraseña']) && !empty($_POST['contraseña'])
                    && isset($_POST['apellidos']) && !empty($_POST['apellidos']) && isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario'])
                    && isset($_POST['correo']) && !empty($_POST['correo'])){
                        include "conexion.php";
                        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db)or die ("no se pudo establecer la conexion.");
                        //recuperar las variables
                        $nombre=$_POST['nombre'];
                        $apellidos=$_POST['apellidos'];
                        $nombre_usuario=$_POST['nombre_usuario'];
                        $correo=$_POST['correo'];
                        $contraseña=$_POST['contraseña'];
                        $rol=2;
                        $nombre_completo = $nombre . " " . $apellidos;

                        //hacemos la sentencia de sql
                        $sql="INSERT INTO cliente (nombre, nombre_usuario, correo, contraseña, rol) VALUES('$nombre_completo', '$nombre_usuario', '$correo', 
                                '$contraseña', '$rol')";
                        //ejecutamos la sentencia de sql
                        $ejecutar=mysqli_query($conexion,$sql);
                        //verificamos la ejecucion
                        if(!$ejecutar){
                            echo"Hubo Algun Error" . $sql . "<br>" . mysqli_error($conexion);
                        }else{
                            echo"Datos Guardados Correctamente<br><a href='registrar.html'>Volver</a>";
                        }
                    }
                    else{
                        echo"<h1>Ingrese todos los campos</h1>";
                    }
                 ?>
                <script>
                    (function(){
            var formulario = document.getElementsByName('formulario')[0],
                elementos = formulario.elements,
                boton = document.getElementById('btn');
            
            var validarNombre = function(e){
            if(formulario.nombre.value == 0){
                alert("Completa el campo nombre.");
                e.preventDefault();
            }
            };

            var validarApellido = function(e){
            if(formulario.apellidos.value == 0){
                alert("Completa el campo de apellidos.");
                e.preventDefault();
            }
            };

            var validarUsuario = function(e){
            if(formulario.nombre_usuario.value == 0){
                alert("Ingresa un nombre de usuario.");
                e.preventDefault();
            }
            };          

            var validarCorreoE = function(e){
                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                if(emailRegex.test(e)){
                    return(true);
                }
                else{
                    return(false)
                }
            };  
            var validarCorreo = function(e){
                if (!validarCorreoE(formulario.correo.value)) {
                    alert("Inserte un correo electrónico valido");
                    e.preventDefault();
                }
            }

            var validarContraseña = function(e){
            if(formulario.contraseña.value == 0){
            alert("Inserte alguna contraseña");
            e.preventDefault();
            }
            };

            var validar = function(e){
            validarNombre(e);
            validarApellido(e);
            validarUsuario(e);
            validarCorreo(e);
            validarContraseña(e);
            };  

            formulario.addEventListener("submit", validar);

        }())

            </script>
            </div>
        </div>
    </div>
</body>
</html>