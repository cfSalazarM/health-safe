let inputs = document.getElementsByTagName('input');
let butEdit = document.getElementById('bEdit');
let butSave = document.getElementById('bSave')

butEdit.addEventListener('click', function() {
    if (butEdit.innerText == 'Editar') {
        for (let index = 0; index < inputs.length; index++) {
            inputs[index].removeAttribute('disabled');
            inputs[index].removeAttribute('readonly');
        }
        butSave.classList.remove('visually-hidden');
        butEdit.innerText = "Deshabilitar edición";
    } else {
        for (let index = 0; index < inputs.length; index++) {
            inputs[index].setAttribute('disabled', 'true');
            inputs[index].setAttribute('readonly', 'true');
           }
            butSave.classList.add('visually-hidden');
            butEdit.innerText = "Editar";
    }

  
});
