const form = document.getElementById('form-addUser');

form.addEventListener('submit', function(e){
    e.preventDefault();

    let datos = new FormData(form);

    console.log(datos.get('password'));

    fetch('../services/registerUser.php', {
        method: 'POST',
        body: datos
    })

    .then(res=>res.json())
    .then(data => {
        console.log(data)
    })
});