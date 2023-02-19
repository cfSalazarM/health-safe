const form = document.getElementById('form-profile');

form.addEventListener('submit', function(e){
    e.preventDefault();

    let data = new FormData(form);

    console.log(data.get('name_user'));

    fetch('../services/updateUser.php', {
        method: 'POST',
        body: data
    })

    .then(res=>res.json())
    .then(data => {
        console.log(data)
    })
});