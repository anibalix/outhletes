<?php
    session_start();
    if(!empty($_SESSION['usuario'])) {
        header("Location:profile.php");exit;
    }

    require_once('clsPhp/clsValidar.php');
    require_once('clsPhp/clsUsuario.php');

    // Aca validamos el login
    if (isset($_POST['submit_login'])){

        $defaultUsername = isset($_POST['user_name'])?$_POST['user_name']:'';
        $defaultPassword = isset($_POST['password'])?$_POST['password']:'';

        $validacionLogin = new Validar('usuarios/usuarios.json');
        $userData = $validacionLogin-> validarLoginUsuario($defaultUsername, $defaultPassword);

        if ($userData != FALSE){
            $_SESSION['usuario'] = $userData;
            header("Location:profile.php");exit;
        } else {
            $validacionLoginv->errores['login']['error'] = 'Error de usuario y contraseña';
            echo "string"; // Aca queda agregar algo si el user no ingresa correctamente algo
        }
    }

    // RECORDAR USUARIO: que si se clickea el checkbox, se guarden los datos del user en COOKIES
    // RECORDAR USUARIO: que si se clickea el checkbox, se guarden los datos del user en COOKIES
    // RECORDAR USUARIO: que si se clickea el checkbox, se guarden los datos del user en COOKIES
    // RECORDAR USUARIO: que si se clickea el checkbox, se guarden los datos del user en COOKIES
    // RECORDAR USUARIO: que si se clickea el checkbox, se guarden los datos del user en COOKIES
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/reset.css" >
        <link rel="stylesheet" href="css/login_styles.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OUTHLETES Log In</title>
    </head>
    <body>

        <div class="main_body">
        <div class="div_opacity">

<!-- NAV BAR -->
            <nav class="nav_bar_top">
                <ul class="ul_nav_bar">
                    <li><a href="index.php"><img src="imagenes/logoSquereOuthletesWHITE.png" alt="" id="logo"/></a></li>
                    <li><a href="index.php"><img src="imagenes/logoOuthletesWHITE.png" alt="" id="logo_full"/></li>
                    <li><a href="signup.php" class="button">SIGN UP</a></li>
                </ul>
            </nav>
<!--  MAIN SECTION-->
            <section class="main_section">
                <div class="login">
                    <!-- <div class="login_top">
                        <h2>LOG IN</h2>
                    </div> -->
                    <form class="form_login" action="" method="post">
                        <a class="fb_button" href=>
                        Log In with Facebook
                        </a><br>

                        <a class="google_button" href=>
                        Log In with Google
                        </a><br>

                        <label for="user_name" class="campo_formulario">Nombre de Usuario</label>
                        <input type="text" name="user_name" value="" placeholder="Nombre de Usuario" id="user_name">
                        <br>

                        <label for="password" class="campo_formulario">Password</label>
                        <input type="password" name="password" value="" placeholder="Contraseña" id="password">
                        <br>

                        <div class="remember_user">
                            <input type="checkbox" name="remember_user" value="" id="remember_user">
                            <label for="remember_user" id="remember_user">Recordar Usuario</label>

                            <a href="#" id="olvido_contraseña">¿Olvidaste tu Contraseña?</a>
                        </div>
                        <br><br>

                        <label for="submit_login" class="campo_formulario">LOG IN</label>
                        <input type="submit" name="submit_login" value="LOG IN" class="submit_login">
                    </form>

                </div>

            </section>

        </div>
        </div>

    </body>
</html>
