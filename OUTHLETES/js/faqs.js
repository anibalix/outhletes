    /*/ejercicio viernes 16.9 con DARIO

CSS pone display none en las Answers de las faqs.
pone cursor X en css en .pregunta

*/

window.onload = function() {

    var arrayQuestions = document.getElementsByClassName('questions'); // poner class='pregunta' a todas las Questions
    var arrayAnswers = document.getElementsByClassName('answers');
    var signoPlus = document.getElementsByClassName('mas');

    for (var i = 0; i < arrayQuestions.length; i++) {
        var pregunta = arrayQuestions[i]; //XQ hay que asignar esta variable? y no Questions[i].onclick ?
        var respuesta = arrayAnswers[i]; //XQ hay que asignar esta variable? y no Questions[i].onclick ?

        pregunta.onclick = function() {
            // console.log(this); -- esto tendria que mostrar en consola la pregunta cuando hago click
            // this es una forma relativa de acceder a un elemento.
            //  o para hacer un toggle:
            this.nextElementSibling.style.transition = '1s';

            if (this.nextElementSibling.style.display == 'block') {
                this.nextElementSibling.style.display = 'none';
                this.nextElementSibling.style.transition = '1s';
            } else {
                this.nextElementSibling.style.display = 'block';
            };

            // for (var j = 0; j < arrayAnswers.length; j++) {
            //     arrayAnswers[j].style.display = 'none';
            // }
            //
            // this.nextElementSibling.style.display = 'block';
        };



        pregunta.onmouseover = function() {
            // this.style.color = 'white';
            this.style.textShadow = '0px 1px 3px white';
            // this.style.transition = '0.3s';
            this.style.letterSpacing = '1.2px';
        };

        pregunta.onmouseout = function() {
            this.style.color = 'orange';
            this.style.textShadow = 'none';
            this.style.letterSpacing = '0px';
        };


    }

    // for (var j = 0; j < signoPlus.length; j++) {
    //     var signo = signoPlus[j]
    //
    //     signo.onclick = function() {
    //             // console.log(this); -- esto tendria que mostrar en consola la pregunta cuando hago click
    //             // this es una forma relativa de acceder a un elemento.
    //             //  o para hacer un toggle:
    //
    //             if (this.nextElementSibling.style.display == 'block') {
    //                 this.nextElementSibling.style.display = 'none';
    //             } else {
    //                 this.nextElementSibling.style.display = 'block';
    //             };
    //
    //             // for (var j = 0; j < arrayAnswers.length; j++) {
    //             //     arrayAnswers[j].style.display = 'none';
    //             // }
    //             //
    //             // this.nextElementSibling.style.display = 'block';
    //         };
    //
    //     signo.onmouseover = function() {
    //         this.style.width = '20px';
    //         this.style.cursor = "pointer";
    //     }
    //
    //     signo.onmouseout = function() {
    //         this.style.width = '15px';
    //         this.style.cursor = "pointer";
    //     }
    // }


}
