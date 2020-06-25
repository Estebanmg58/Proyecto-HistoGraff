 'use strict'
function valida(){
 var clave=document.getElementById("#clave").value();
 var clave1=document.getElementById("#clave1").value();

    if(clave.lenght < 8 && clave1.lenght < 8 ){
        alert("la contraseña  debe contener al menos 7 caracteres");
    }
  };