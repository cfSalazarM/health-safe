const form = document.getElementById('form-addMedicine');

form.addEventListener('submit', function (e) {
    e.preventDefault();

    let datos = new FormData(form);

    fetch('../services/registerMedicine.php', {
        method: 'POST',
        body: datos
    })

    .then(res=>res.json())
    .then(data => {
        console.log(data)
    })

    let tbody = document.getElementById('tbody');
    let fila = document.createElement('tr');

    let celda_code = document.createElement('td');
    let celda_name  = document.createElement('td');
    let celda_presentation = document.createElement('td');
    let celda_due_date = document.createElement('td');
    let celda_amount = document.createElement('td');

    let nodo_code = document.createTextNode(datos.get('code'));
    let nodo_name = document.createTextNode(datos.get('name'));
    let nodo_presentation = document.createTextNode(datos.get('presentation'));
    let nodo_due_date = document.createTextNode(datos.get('due_date'));
    let nodo_amout = document.createTextNode(datos.get('amount'));

    celda_code.appendChild(nodo_code);
    celda_name.appendChild(nodo_name);
    celda_presentation.appendChild(nodo_presentation);
    celda_due_date.appendChild(nodo_due_date);
    celda_amount.appendChild(nodo_amout);

    fila.appendChild(celda_code);
    fila.appendChild(celda_name);
    fila.appendChild(celda_presentation);
    fila.appendChild(celda_due_date);
    fila.appendChild(celda_amount);

    celdaEditDelete.innerHTML = '<a href="#addMedicineModal" class="edit" data-bs-toggle="modal" id="aEditAero"><img src="../assets/icono-editar.svg" width="38" height="38" data-toggle="tooltip" title="Editar"></a></td>' +
                        '<a href="#deleteMedicineModal" class="delete" data-bs-toggle="modal"><img src="../assets/icono-eliminar.svg" width="38" height="38" data-toggle="tooltip" title="Eliminar"></a></td>';
   fila.appendChild(celdaEditDelete);

    tbody.appendChild(fila);

    document.getElementById('name').value = "";
    document.getElementById('user').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('password').value = "";

});