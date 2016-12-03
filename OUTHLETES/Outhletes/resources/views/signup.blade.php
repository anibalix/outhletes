<?php
    //session_start();
    //
    // if(!empty($_SESSION['usuario'])) {
    //     header("Location:perfil.php");exit;
    // }
    require_once('clsPhp/clsValidar.php');
    require_once('clsPhp/clsUsuario.php');

    $validacion = new Validar('usuarios/usuarios.json');
    $defaultName = '';
    $defaultApellido = '';
    $defaultEmail = '';
    $defaultUsername = '';
    $defaultPassword = '';
    $defaultPasswordConfirm = '';

    if (!empty($_POST)){
        //Aca registramos el usuario
        if (isset($_POST['submit_signup'])){

            //$defaultName = isset($_POST['name'])?$_POST['name']:'';
            $defaultName = isset($_POST['name'])?$_POST['name']:'';
            $defaultApellido = isset($_POST['last_name'])?$_POST['last_name']:'';
            $defaultUsername = isset($_POST['user_name'])?$_POST['user_name']:'';
            $defaultEmail = isset($_POST['email'])?$_POST['email']:'';
            $defaultPassword = isset($_POST['password'])?$_POST['password']:'';
            $defaultPasswordConfirm = isset($_POST['confirm_password'])?$_POST['confirm_password']:'';

            $validacion->validarRegistro($defaultName,
                                            $defaultApellido,
                                            $defaultEmail,
                                            $defaultUsername,
                                            $defaultPassword,
                                            $defaultPasswordConfirm);

            if ($validacion->esValida()){

            //   if(empty($_FILES['imagen'])) {
            //     $imagen = FALSE;
            //   } else {
            //     $imagen = $_FILES['imagen'];
            //   }

                // si se agrega input file, agregar parametro $imagen en $usuario
                $usuario = new Usuario($defaultName,
                                          $defaultEmail,
                                          $defaultUsername,
                                          $defaultPassword,
                                          'usuarios/usuarios.json');

                if($usuario->guardarUsuario($usuario)) {
                    header("Location:exito");exit;
                } else {
                    die('ERROR al registrate, intenta luego');
                }

            }
        }
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/signup_styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OUTHLETES Sign Up</title>
</head>

<body>
    <script type="text/javascript" src='js/signup.js'></script>
    <div class="main_body">
        <div class="div_opacity">

            <!-- NAV BAR -->
            <div class="nav_bar_top">
                <ul class="ul_nav_bar">
                    <li>
                        <a href="index.php"><img src="imagenes/logoSquereOuthletesWHITE.png" alt="" id="logo" /></a>
                    </li>
                    <li>
                        <a href="index.php"><img src="imagenes/logoOuthletesWHITE.png" alt="" id="logo_full" /></li>
                    <li><a href="login.php" class="button">LOG IN</a></li>
                </ul>
            </div>
            <!--  MAIN SECTION-->
            <section class="main_section">
                <div class="sign_up" id="sign_up">
                    <!-- <div class="login_top">
                        <h2>SIGN UP</h2>
                    </div> -->
                    <form class="form_sign_up" action="signup.php" method="post">
                        <a class="fb_button" href=>
                        Sign up with Facebook
                        </a><br>

                        <a class="google_button" href=>
                        Sign up with Google
                        </a><br>

                        <label for="name" class="campo_formulario">Nombre</label>
                        <input type="text" name="name"  placeholder="Nombre" id="name" value="<?=$defaultName ?>" >
                        <br>

                        <label for="last_name" class="campo_formulario">Apellido</label>
                        <input type="text" name="last_name" placeholder="Apellido" id="last_name" value="<?=$defaultApellido ?>" >
                        <br>

                        <label for="user_name" class="campo_formulario">Nombre de Usuario</label>
                        <input type="text" name="user_name" value="" placeholder="Nombre de Usuario" id="user_name" value="<?=$defaultUsername ?>">
                        <br>

                        <label for="email" class="campo_formulario">E-Mail</label>
                        <input type="email" name="email" value="" placeholder="E-Mail" id="email" value="<?=$defaultEmail ?>" >
                        <br>

                        <label for="password" class="campo_formulario">Password</label>
                        <input type="password" name="password" value="" placeholder="Contraseña" id="password">
                        <br>

                        <label for="confirm_password" class="campo_formulario">confirm_password</label>
                        <input type="password" name="confirm_password" value="" placeholder="Confirmar contraseña" id="confirm_password">
                        <br>

                        <div class="alerta">
                          <p class="textoAlerta" id="textoAlerta"></p>
                          <?=$validacion->mostrarError('email')?>


                        </div>
                        <br>

                        <label for="submit_signup" class="campo_formulario">SIGN UP</label>
                        <input type="submit" name="submit_signup" value="SIGN UP" class="submit_signup">

                    </form>
                </div>
            </section>
        </div>

    </div>

</body>

</html>
