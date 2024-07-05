document.querySelector('form').addEventListener('submit',(e) => {
    let email = document.getElementById('email').value.trim();
    let password_user = document.getElementById('password_user').value.trim(); ;

    if(email.length <= 12) {
        alert("debe de haber mas de 10 caracteres");
        e.preventDefault();
    }else if(email.length >= 40){
        alert("maximo de caracteres para crear usuario es 40,usuario innabilitado");
        e.preventDefault();
    }

    if (password_user.length <=8 ) {
        alert("debe de haber mas de 8 caracteres");
        e.preventDefault();
    }else if(password_user.length >= 18){
        alert("maximo de caracteres es 18,contraseña innabilitada");
        e.preventDefault();
    }
})