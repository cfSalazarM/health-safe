let addAdminModal = document.getElementById('addUserModal');

addAdminModal.addEventListener('shown.bs.modal', ()=> {
    document.getElementById('nombre').value = "";
    document.getElementById('nomUsuario').value = "";
    document.getElementById('tel').value = "";
    document.getElementById('contraseña').value = "";
});