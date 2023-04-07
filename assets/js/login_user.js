//        Censo - Form   --version 1.0 
// William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023 


const pass_input = document.getElementById('pass_input');
const checkbox = document.getElementById('ver_pass');


// Adding listener
checkbox.addEventListener('change', () => {
    if (checkbox.checked) {
        pass_input.type = "text";
    } else {
        pass_input.type = "password";
    }
});