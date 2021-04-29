(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

var check = function () {
    if (document.getElementById('inputPassword4').value ==
        document.getElementById('inputConfirmPassword').value) {
        document.getElementById('message').style.color = '#198754';
        document.getElementById('message').innerHTML = 'Password benar';
        document.getElementById('inputConfirmPassword').style.borderColor = '#198754';
    } else {
        document.getElementById('message').style.color = '#dc3545';
        document.getElementById('message').innerHTML = 'Password salah';
        document.getElementById('inputConfirmPassword').style.borderColor = '#dc3545';
    }
}

$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});