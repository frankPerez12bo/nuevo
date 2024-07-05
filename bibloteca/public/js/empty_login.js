document.querySelector('form').addEventListener('submit',(e)=>{
    let email = document.getElementById('email').value.trim();
    let password_user = document.getElementById('password_user').value.trim();

    if (email == '' || password_user == '') {
        confirm("debes completar los campos");
        e.preventDefault();
    }
})