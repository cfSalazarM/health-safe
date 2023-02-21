let user = document.getElementById('edit');
let input = document.getElementById('userOld');

let editModal = document.getElementById('editUserModal');
let deleteModal = document.getElementById('deleteUserModal');

editModal.addEventListener('shown.bs.modal', event => {
    let but = event.relatedTarget;
    let userOld = but.getAttribute('data-bs-u');

    let inputNom = document.getElementById('nomEdit');
    let inputUser = document.getElementById('userEdit');
    let inputTel = document.getElementById('telEdit');
    let inputPass = document.getElementById('passwordEdit')
    
    let formData = new FormData()
    formData.append('userOld', userOld);
    input.value = userOld;

    fetch('../services/getUser.php', {
        method: 'POST',
        body: formData
    })

    .then(res=>res.json())
    .then(data => {
        console.log(data);
        console.log(inputNom);
        document.getElementById('nomEdit').value = data[0];
        inputUser.value = data[1];
        console.log(inputUser.value)
        inputTel.value = data[2];
        inputPass.value = data[3];

    }).catch(err => console.log(err))
});

deleteModal.addEventListener('show.bs.modal', event => {
    let but = event.relatedTarget
    let user = but.getAttribute('data-bs-u');
    console.log(user);
    let inputUser = document.getElementById('userDelete');
    inputUser.value = user;
})