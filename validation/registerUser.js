
function passwordValidation(inputField, minLength) {
    inputField.addEventListener('input', function () {
        var a = minLength - inputField.value.length;
        if (inputField.value.length < minLength) {
            inputField.setCustomValidity('Please enter at least ' + a + ' more characters.');
        } else {
            inputField.setCustomValidity('');
        }
    });
}

// Usage:
var inputField = document.getElementById('pass');
var minLength = 10;

passwordValidation(inputField, minLength);
// password validation

function passwordCfnValidation() {
    var password = document.getElementById('pass').value;
    var passwordCfn = document.getElementById('passcfn').value;
    var nameInput = document.getElementById('passcfn');

    if (passwordCfn != password) {
        nameInput.setCustomValidity('Your Password must be same');
    } else {
        nameInput.setCustomValidity('');
    }
}
// password confirmation validation

function nameValidation() {
    var nameInput = document.getElementById('name');
    // var name = nameInput.value.trim();
    var name = document.getElementById('name');
    
    // Regular expression to match only English letters, numbers, and underscores
    var nameReq = /^[a-zA-Z0-9_]+$/;

    if (!nameReq.test(name)) {
        nameInput.setCustomValidity('Only English letters, numbers, and underscores are allowed.');
    } else if (name.length > 30) {
        nameInput.setCustomValidity('Your name has exceeded 30 characters.');
    } else {
        nameInput.setCustomValidity('');
    }
}
// name validation

function telNumValidation() {
    var telInput = document.getElementById('phone_no');
    var tel = telInput.value.trim();
    // to remove space exiting in the number (if there is any)

    var telNumReq = /^(?:\+?6?01(?:\d{7}|\d{8}))$/;
    // var telNumReq = /^01[0-9]-\d{7,8}$/;   - PHP method

    if (!telNumReq.test(tel)) {
        telInput.setCustomValidity('Your telephone number must be in the Malaysia phone number format.');
    } else {
        telInput.setCustomValidity('');
    }
}
// telephone number validation

function mailValidation() {
    var mailInput = document.getElementById('email');
    var mail = mailInput.value.trim();

    var mailReq = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!mailReq.test(mail)) {
        mailInput.setCustomValidity('Your email must be in the correct email format.');
    } else {
        mailInput.setCustomValidity('');
    }
}
// email validation