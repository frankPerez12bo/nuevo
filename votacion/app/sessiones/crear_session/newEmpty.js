let formulario = document.getElementById('formulario');


formulario.addEventListener('submit', function(e) {
    let nombre_completo = document.getElementById('nombre_completo').value.trim();
    let correo_usuario = document.getElementById('correo_usuario').value.trim();
    let clave_usuario = document.getElementById('clave_usuario').value.trim();
    let dni = document.getElementById('dni').value.trim();

    if (nombre_completo == '' || correo_usuario == '' || clave_usuario == '' || dni == '') {
        alert('rellene por favor los campos.....');
        e.preventDefault();
    }else{

    }
});