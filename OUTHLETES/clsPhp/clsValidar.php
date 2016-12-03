<?php
    class Validar {
        //array de errores de validacion
        public $errores = array();
        public $expresionNombre = '/^[a-zA-Z áéíóúÁÉÍÓÚ].{2,50}+$/';
        public $expresionNombreUsuario = '/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/';
        public $expresionPassword = '/^.{4,30}$/';
        public $ruta;

        public function __construct($origen) {
            $this->ruta = $origen;
        }

        public function esValida() {
            if(empty($this->errores)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function mostrarError($campo) {
            if(!empty($this->errores[$campo])) {
                return $this->errores[$campo]['error'];
            } else {
                return '';
            }
        }

        public function validarNombre($nombre){
            $nombre = trim($nombre);

            if ($nombre == ''){
                $this->errores['nombre']['error'] = 'Su nombre esta vacio';
                $this->errores['nombre']['dato'] = $nombre;
            } else {
                if (strlen($nombre) > 1 && preg_match($this->expresionNombre, $nombre)){
                } else {
                    $this->errores['nombre']['error'] = 'Escribi bien tu nombre che';
                    $this->errores['nombre']['dato'] = $nombre;
                }
            }
        }

        public function validarApellido($apellido){
            $apellido = trim($apellido);

            if ($apellido == ''){
                $this->errores['apellido']['error'] = 'Su apellido esta vacio';
                $this->errores['apellido']['dato'] = $apellido;
            } else {
                if (strlen($apellido) > 1 && preg_match($this->expresionNombre, $apellido)){
                } else {
                    $this->errores['apellido']['error'] = 'Escribi bien tu apellido che';
                    $this->errores['apellido']['dato'] = $apellido;
                }
            }
        }

        public function validarEmail($email,$unique=FALSE,$exclude=FALSE){
            $email = trim($email);

            if ($email == ''){
                $this->errores['email']['error'] = 'El email esta vacio';
                $this->errores['email']['dato'] = $email;
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(!$unique) {
                    } else {
                        if(!$this->buscarUsuarioPorEmail($email,$exclude)) {
                        } else {
                            $this->errores['email']['error'] = 'El email esta en uso';
                            $this->errores['email']['dato'] = $email;
                        }
                    }
                } else {
                    $this->errores['email']['error'] = 'Escribi bien tu email';
                    $this->errores['email']['dato'] = $email;
                }
            }
        }

        public function validarNombreUsuario($userName,$unique=FALSE,$exclude=FALSE){
            $userName = trim($userName);

            if ($userName == ''){
                $this->errores['username']['error'] = 'El nombre de usuario esta vacio';
                $this->errores['username']['dato'] = $userName;
            } else {
                if (preg_match($this->expresionNombreUsuario, $userName)){
                    if(!$unique) {
                    } else {
                        if($this->buscarUsuarioPorNombreDeUsuario($userName,$exclude)) {
                            $this->errores['username']['error'] = 'El nombre de usuario esta en uso';
                            $this->errores['username']['dato'] = $userName;
                        }
                    }

                } else {
                    $this->errores['username']['error'] = 'Escribi bien tu nombre de usuario';
                    $this->errores['username']['dato'] = $userName;
                }
            }
        }

        public function validarPassword($password, $passwordConfirm){
            $password = trim($password);

            if (!preg_match($this->expresionPassword, $password)){
                $this->errores['password']['error'] = 'El password no cumple las reglas';
                $this->errores['password']['dato'] = $password;
            } else {
                if($password != $passwordConfirm) {
                    $this->errores['password']['error'] = 'Los passwords no coinciden';
                    $this->errores['password']['dato'] = $password;
                } else {
                }
            }
        }

      // agregar , $passwordConfirm en esta function
        public function validarRegistro($nombre, $apellido, $email, $userName, $password, $passwordConfirm){
            $this->validarNombre($nombre);
            $this->validarApellido($apellido);
            $this->validarEmail($email,TRUE);
            $this->validarNombreUsuario($userName,TRUE);
            $this->validarPassword($password,$passwordConfirm);
        }

        public function validarCamposLogin($email, $password){
            $this->validarEmail($email);
            $this->validarPassword($password,$password);
        }

        function buscarUsuarioPorEmail($email,$exclude=FALSE){
            $archivo = file_get_contents($this->ruta);
            if(!empty($archivo)) {
                $usuariosJson = json_decode($archivo,true);
            } else {
                $usuariosJson = FALSE;
            }

            if(empty($usuariosJson['usuarios'])) {
                return false;
            }

            foreach ($usuariosJson['usuarios'] as $u){

                if(empty($exclude)) {
                    if($u["email"] == $email){
                        return true;
                    }
                } else {
                    if($u["email"] == $email && $u['email'] != $exclude){
                        return true;
                    }
                }
            }
            return false;
        }

        function buscarUsuarioPorNombreDeUsuario($userName,$exclude){
            $archivo = file_get_contents($this->ruta);
            if(!empty($archivo)) {
                $usuariosJson = json_decode($archivo,true);
            } else {
                $usuariosJson = FALSE;
            }

            foreach ($usuariosJson['usuarios'] as $u){
                if(empty($exclude)) {
                    if(strtolower($u["username"]) == strtolower($userName)){
                        return true;
                    }
                } else {
                    if(strtolower($u["username"]) == strtolower($userName) && $u['username'] != $exclude){
                        return true;
                    }
                }
            }
            return false;
        }

        public function validarLoginUsuario($userName, $password){
            $archivo = file_get_contents($this->ruta);
            $usuariosJson = json_decode($archivo,true);

            foreach ($usuariosJson['usuarios'] as $u){
                if($u["username"] == $userName && $u["password"] == sha1($password)){
                    return $u;
                }
            }
            return false;
        }

    }
?>
