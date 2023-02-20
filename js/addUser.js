const form = document.getElementById('form-addUser');

form.addEventListener('submit', function (e) {
    e.preventDefault();

    let datos = new FormData(form);

    console.log(datos.get('password'));

    console.log(datos.get('nom'));

    fetch('../services/registerUser.php', {
        method: 'POST',
        body: datos
    })

    .then(res=>res.json())
    .then(data => {
        console.log(data)
    })

    let tbody = document.getElementById('tbody');
    let fila = document.createElement('tr');

    let celda_nom_usuario = document.createElement('td');
    let celda_user  = document.createElement('td');
    let celda_phone = document.createElement('td');
    let celda_password = document.createElement('td');
    let celdaEditDelete = document.createElement('td');

    let nodo_nom_usuario = document.createTextNode(datos.get('nom'));
    let nodo_user = document.createTextNode(datos.get('user'));
    let nodo_phone = document.createTextNode(datos.get('tel'));
    let nodo_password = document.createTextNode(datos.get('password'));

    celda_nom_usuario.appendChild(nodo_nom_usuario);
    celda_user.appendChild(nodo_user);
    celda_phone.appendChild(nodo_phone);
    celda_password.appendChild(nodo_password);

    fila.appendChild(celda_nom_usuario);
    fila.appendChild(celda_user);
    fila.appendChild(celda_phone);
    fila.appendChild(celda_password);

    celdaEditDelete.innerHTML = '<a href="#addUserModal" class="edit" data-bs-toggle="modal" id="aEditAero"><img src="../assets/icono-editar.svg" width="38" height="38" data-toggle="tooltip" title="Editar"></a></td>' +
                        '<a href="#deleteUserModal" class="delete" data-bs-toggle="modal"><img src="../assets/icono-eliminar.svg" width="38" height="38" data-toggle="tooltip" title="Eliminar"></a></td>';
   fila.appendChild(celdaEditDelete);

    tbody.appendChild(fila);

    document.getElementById('name').value = "";
    document.getElementById('user').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('password').value = "";

});