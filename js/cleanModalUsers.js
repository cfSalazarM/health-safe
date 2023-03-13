let addUserModal = document.getElementById('addUserModal');

addUserModal.addEventListener('shown.bs.modal', event=> {

    document.getElementById('nom').value = "";
    document.getElementById('user').value = "";
    document.getElementById('tel').value = "";
    document.getElementById('password').value = "";
});