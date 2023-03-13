let addMedicineModal = document.getElementById('addMedicineModal');

addMedicineModal.addEventListener('shown.bs.modal', event=> {

    document.getElementById('codigo').value = "";
    document.getElementById('nombreMedicamento').value = "";
    document.getElementById('Presentación').value = "";
    document.getElementById('f-caducidad').value = "";
    document.getElementById('Cantidad').value = "";
});