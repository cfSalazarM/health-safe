let eye = document.getElementsByClassName('fa-eye');
let ban = eye[0].classList.contains('fa-eye-slash');
let input = document.getElementById('password');

console.log(ban);


eye[0].addEventListener('click', function () {

    if (ban == false) {
        console.log('pase');
        eye[0].classList.replace('fa-eye', 'fa-eye-slash');
        input.setAttribute('type', 'text');
        eye = document.getElementsByClassName('fa-eye-slash', 'fa-eye');
        ban = true;
    }
    else {
        console.log('pase')
        eye[0].classList.replace('fa-eye-slash', 'fa-eye');
        input.setAttribute('type', 'password');
        eye = document.getElementsByClassName('fa-eye');
        ban = false;
    }

});



