<?php
    class Usuario {

        public $nombre, $email, $username, $password;
        // public $imagen = array();
        public $ruta;

        // si se agrega input file, agregar parametro $imagen y $this->imagen = $imagen; en Usuario __construct
        public function __construct($nombre,
                                  $email,
                                  $username,
                                  $password,
                                  $origen){

            $this->nombre = $nombre;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->ruta = $origen;
        }

        public function guardarUsuario(){
            //Si el archivo existe tomamos los datos actuales y agregamos
            if(file_exists($this->ruta)) {
                $archivo = file_get_contents($this->ruta);
                $arrUsuariosActuales = json_decode($archivo,true);
            } else {
                //Si no existe solo creamos un array nuevo y agregamos el user
                $arrUsuariosActuales = array();
            }

            $arrayUsuario = array();
            $arrayUsuario['nombre'] = $this->nombre;
            $arrayUsuario['username'] = $this->username;
            $arrayUsuario['email'] = $this->email;
            $arrayUsuario['password'] = $this->hashearPassword($this->password);

            $arrUsuariosActuales['usuarios'][] = $arrayUsuario;

            //Escribimos el archivo con el nuevo usuario
            $arrUsuariosActuales = json_encode($arrUsuariosActuales);
            $apertura = fopen($this->ruta, 'w+');
            fwrite($apertura, $arrUsuariosActuales);
            fclose($apertura);

            // if(!empty($this->imagen)) {
            //   $this->subirImagen();
            // }

        return true;
        }

        public function hashearPassword($password) {
            return sha1($password);
        }

        // public function subirImagen(){
        //
        //     if (!empty($this->imagen['name'])){
        //
        //       $info = pathinfo($this->imagen['name']);
        //       $extension = $info['extension'];
        //       $nombreArchivo = $this->email . '.' . $extension;
        //       $ruta = 'imagenesPerfil/' . $nombreArchivo;
        //
        //       move_uploaded_file($this->imagen['tmp_name'], $ruta);
        //
        //       return $ruta;
        //     }
        // }
    }
?>
