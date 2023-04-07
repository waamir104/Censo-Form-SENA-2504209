//        Censo - Form   --version 1.0 
// William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023 


// General functions importation
import * as validate from '../general_functions.js';

// Declaration of Elements constant variables
const name_input = document.getElementById('name_input');
const edad_input = document.getElementById('edad_input');
const email_input = document.getElementById('email_input');
const num_cell_input = document.getElementById('num_cell_input');
const salud_input = document.getElementById('salud_input');
const direccion_input = document.getElementById('direccion_input');
const contact_emer_1_nombre = document.getElementById('contact_emer_1-nombre');
const contact_emer_1_cell = document.getElementById('contact_emer_1-cell');
const contact_emer_2_nombre = document.getElementById('contact_emer_2-nombre');
const contact_emer_2_cell = document.getElementById('contact_emer_2-cell');
const textareas = document.getElementsByTagName('textarea');
const update_form = document.getElementById('update_form');
const save_btn = document.getElementById('save_btn');

// Error msgs
const error_cell_msg_apr = document.getElementById('error_cell_msg_apr');
const error_cell_msg_con1 = document.getElementById('error_cell_msg_con1');
const error_cell_msg_con2 = document.getElementById('error_cell_msg_con2');


// Event listeners

// Input name validation
name_input.addEventListener('input', () => {
    // MaxLength
    validate.limit_length(name_input, 255);
    // Only letters
    validate.only_letters(name_input);
});

// Input age validation
edad_input.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(edad_input, 2);

    let characters = /[^0-9]/g;

    // Only numbers validation
    validate.only_numbers(edad_input);

    if (edad_input.value[0] == 0) {
        edad_input.value = edad_input.value.slice(1);
    }
});

// Input email validation
email_input.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(email_input, 255);
});

// Input student phone number
num_cell_input.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(num_cell_input, 10);

    // Only numbers
    validate.only_numbers(num_cell_input);

    // Remove error 
    num_cell_input.classList.remove('cell_error');
    error_cell_msg_apr.classList.add('hide_error_num_msg');
    error_cell_msg_apr.classList.remove('show_error_num_msg');
});

// Input salud name
salud_input.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(salud_input, 100)
});

// Input address validation
direccion_input.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(direccion_input, 255);
});

// Inputs Contact 1
contact_emer_1_nombre.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(contact_emer_1_nombre, 100);

    // Only letters
    validate.only_letters(contact_emer_1_nombre);
});

contact_emer_1_cell.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(contact_emer_1_cell, 10);

    // Only numbers
    validate.only_numbers(contact_emer_1_cell);

    // Remove error
    contact_emer_1_cell.classList.remove('cell_error');
    error_cell_msg_con1.classList.add('hide_error_num_msg');
    error_cell_msg_con1.classList.remove('show_error_num_msg');
});

// Inputs Contact 2
contact_emer_2_nombre.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(contact_emer_2_nombre, 100);

    // Only letters
    validate.only_letters(contact_emer_2_nombre);
});

contact_emer_2_cell.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(contact_emer_2_cell, 10);

    // Only numbers
    validate.only_numbers(contact_emer_2_cell);

    // Remove error
    contact_emer_2_cell.classList.remove('cell_error');
    error_cell_msg_con2.classList.add('hide_error_num_msg');
    error_cell_msg_con2.classList.remove('show_error_num_msg');
});

// Textareas 
for (let i = 0; i < textareas.length; i++) {
    textareas[i].addEventListener('input', () => {
        // MaxLength
        validate.limit_length(textareas[i], 400)
    });
}

// Submit btn
update_form.addEventListener('submit', function (event) {
    let num_cell_apr = num_cell_input.value;
    let contact_1_cell = contact_emer_1_cell.value;
    let contact_2_cell = contact_emer_2_cell.value;

    if ((num_cell_apr.length != 7 && num_cell_apr.length != 10) || (contact_1_cell.length != 7 && contact_1_cell.length != 10) || (contact_2_cell.length != 7 && contact_2_cell.length != 10 && contact_2_cell.length != 0)) {
        event.preventDefault();
        if (num_cell_apr.length != 7 && num_cell_apr.length != 10) {
            num_cell_input.classList.add('cell_error');
            error_cell_msg_apr.classList.remove('hide_error_num_msg');
            error_cell_msg_apr.classList.add('show_error_num_msg');

        }

        if (contact_1_cell.length != 7 && contact_1_cell.length != 10) {
            contact_emer_1_cell.classList.add('cell_error');
            error_cell_msg_con1.classList.remove('hide_error_num_msg');
            error_cell_msg_con1.classList.add('show_error_num_msg');

        }

        if(contact_2_cell.length == 0){
            // nada
        } else if (contact_2_cell.length != 7 && contact_2_cell.length != 10) {
            contact_emer_2_cell.classList.add('cell_error');
            error_cell_msg_con2.classList.remove('hide_error_num_msg');
            error_cell_msg_con2.classList.add('show_error_num_msg');

        }

    }


});