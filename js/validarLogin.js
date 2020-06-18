//validacion del login de administrador
function validarLogin(){

    var usuario, clave; 

    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;

    username = /\w+@\w+\.+[a-z]/;

    if (usuario === "" || clave === ""){
        alert ("Ingrese el usuario y contraseña");
        return false;
    }
    else if (!username.test(usuario)){
        alert ("El correo no es válido");
        return false;
    }
    else if (clave.length < 6){
        alert ("La contraseña debe tener por lo menos 6 caracteres");
        return false;
    }
}