let code = document.getElementById('edit');
let input = document.getElementById('codeOld');

let editModal = document.getElementById('editMedicineModal');
let deleteModal = document.getElementById('deleteMedicineModal');

//obtine a los elementos html a través de el ID
editModal.addEventListener('shown.bs.modal', event => {
    let but = event.relatedTarget;
    let codeOld = but.getAttribute('data-bs-code');

    let inputCode = document.getElementById('codeEdit');
    let inputNom = document.getElementById('nameEdit');
    let inputPresentation = document.getElementById('presentationEdit');
    let inputDate = document.getElementById('dateEdit');
    let inputAmount = document.getElementById('amountEdit');

    let formData = new FormData()
    formData.append('codeOld', codeOld);
    input.value = codeOld;

    fetch('../services/getMedicine.php', {
        method: 'POST',
        body: formData
    })
// carga los inputs con los datos de la base de datos
        .then(res => res.json())
        .then(data => {
            console.log(data);
            console.log(inputNom);
            document.getElementById('codeOld').value = data[0];
            inputCode.value = data[0];
            inputNom.value = data[1];
            console.log(inputNom.value)
            inputPresentation.value = data[2];
            inputDate.value = data[3];
            inputAmount.value = data[4];
            document.getElementById('amountOld').value = data[4];
            console.log(document.getElementById('amountOld').value);

        }).catch(err => console.log(err))
});

// elimimia el usuario seleccionado
deleteModal.addEventListener('show.bs.modal', event => {
    let but = event.relatedTarget
    let code = but.getAttribute('data-bs-code');
    console.log(code);
    let inputCode = document.getElementById('codeDelete');
    inputCode.value = code;
})