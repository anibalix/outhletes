window.onload = function() {

    var inputNombre = document.getElementById('name');


    //Codigo Ariel
//// asigno variables a los elementos para agregarle eventos luego:
      var inputApellido = document.getElementById('last_name');
      var inputUserName = document.getElementById('user_name');
      var inputEmail=document.getElementById('email');
      var inputPassword = document.getElementById('password');
      var inputConfirmPassword = document.getElementById('confirm_password');
//Agrego los enventos a los otros campos
    inputNombre.addEventListener("focusout", validarCampo,true);
    inputApellido.addEventListener("focusout", validarCampo,true);
    inputUserName.addEventListener("focusout", validarCampo,true);
    inputEmail.addEventListener("focusout", validarCampo,true);
    inputPassword.addEventListener("focusout", validarCampo,true);
    inputConfirmPassword.addEventListener("focusout", validarCampo,true);
// IDEA: declaro Funcion validar . se encarga de chequear si los campos estan vacios y cuando enecuentra el de mail hace otro chequeo con regex.
      function validarCampo(){
        var idElemento= this.id;
        var nombreElementoActual = this.name;
        var patrn=new RegExp("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$");
        var mail=document.getElementById(idElemento).value;
        var checked = patrn.test(mail);
        if (this.value == "" || this.value == null ) {
          var alertaCampo=document.getElementById(idElemento);
          alertaCampo.classList.add("alertaCampo");
          //console.log(styleElemento);
          console.log("id: "+idElemento);
          console.log("nombre:"+nombreElementoActual);
          document.getElementById("textoAlerta").innerHTML = "El campo "+"<span>"+nombreElementoActual+"</span>"+" no puede estar vacio"

          //console.log(alertaCampo);
          //De todos los datos que entran aca trabajo con el campo email primero identificandolo.
        }

        else if (nombreElementoActual == "email" && !checked ) {
            console.log("checked");
            var alertaCampoMail=document.getElementById(idElemento)

            alertaCampoMail.classList.add("alertaCampo");

          }

        else {
            var idElemento= this.id;
            var elemento =document.getElementById(idElemento);
            document.getElementById("textoAlerta").innerHTML = ""
            console.log("sarasa"+idElemento);
            var alertaCampo=document.getElementById(idElemento);
            elemento.classList.remove("alertaCampo");
            //una vez que el form tiene contenido me fijo que los campos de password y confirm sean iguales, sino que alerte al usuario en el campo de alerta ya establecido.
            if (nombreElementoActual == "confirm_password" ||nombreElementoActual == "password" ) {
              if (inputPassword.value != confirm_password.value ) {
                console.log("las Claves NO son iguales");
                document.getElementById("textoAlerta").innerHTML = "Las claves no son iguales"

              }

            }
            return false;
        }
        return true;
      }


    // VALIDACION
    //
    // var inputSubmit = document.getElementById('signup');
    //
    // inputSubmit.onclick = function(e) { // Al clickear en submit, comienza la validacion. OTRA opcion es que se valide en cuanto se salga el focus o como se llame de cada campo del formulario
    //     e.preventDefault(); //evita que mande a otra pagina al clickear submit
    //
    //     if (inputNombre.value.length) { // este if lo puedo guardar en una funcion X y reutilizarla en otras validaciones de mismo type.
    //          console.log("OK");
    //
    //         registrar(); // esta funcion la reutilizo en AJAX, es lo que comunica con URL para registrar en web de DigitalHouse.
    //     } else {
    //         // console.log('todo mal');
    //     }
    // }; // FIN del onclick submit VALIDACION


// CONSIGNA de SPRINT 2
    // function registrar() {
    //     // NUEVO USUARIO -- con cada submit registra uno en la web indicada.
    //     var xmlhttp_nuevoUsuario = new XMLHttpRequest();
    //     xmlhttp_nuevoUsuario.onreadystatechange = function() {
    //         if (xmlhttp_nuevoUsuario.readyState == 4 && xmlhttp_nuevoUsuario.status == 200) {
    //             console.log('prueba');
    //         }
    //     };
    //     xmlhttp_nuevoUsuario.open("GET", "https://sprint.digitalhouse.com/nuevoUsuario", true);
    //     xmlhttp_nuevoUsuario.send();
    //
    //     //GET USUARIO -- con cada submit me devuelve cuantos registrados hay en la url. Nombre de variable DEBE ser distinta a la anterior.
    //     var xmlhttp_getUsuarios = new XMLHttpRequest();
    //     xmlhttp_getUsuarios.onreadystatechange = function() {
    //         if (xmlhttp_getUsuarios.readyState == 4 && xmlhttp_getUsuarios.status == 200) {
    //             var ajaxRegistroUsuarios = JSON.parse(xmlhttp_getUsuarios.responseText);
    //             var cantidadRegistrados = ajaxRegistroUsuarios.cantidad;
    //
    //               console.log(cantidadRegistrados);
    //             var elemento = document.getElementById('sign_up');
    //             var nodo = elemento.children.item(0);
    //             elemento.removeChild(nodo);
    //
    //             // var usuariosRegistrados = elemento.innerText = 'Usuarios registrados hasta el momento:' + '\n' + '\n' + cantidadRegistrados + ' usuarios.';
    //             // elemento.style.color = 'orange';
    //             // elemento.style.padding = '4%';
    //             var nuevoLogin = document.getElementById('sign_up');
    //             // var nuevoElemento = document.createElement('div');
    //             // var texto = document.createTextNode('Usuarios registrados hasta el momento: <br>' + cantidadRegistrados + ' usuarios.');
    //             // nuevoElemento.appendChild(texto);
    //             // nuevoLogin.appendChild(nuevoElemento);
    //
    //             nuevoLogin.innerHTML = 'Usuarios registrados hasta el momento: <br><br>';
    //             nuevoLogin.innerHTML += cantidadRegistrados;
    //             nuevoLogin.innerHTML += ' usuarios.';
    //             nuevoLogin.style.padding = '50px';
    //             nuevoLogin.style.color = 'orange';
    //             nuevoLogin.style.textAlign = 'center';
    //             nuevoLogin.style.transition = '1s';
    //         }
    //     };
    //     xmlhttp_getUsuarios.open("GET", "https://sprint.digitalhouse.com/getUsuarios", true);
    //     xmlhttp_getUsuarios.send();
    //
    // } // FIN de funcion registrar
} //FIN del ONLOAD
