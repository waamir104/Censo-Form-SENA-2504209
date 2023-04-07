//        Censo - Form   --version 1.0 
// William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023 


// General functions importation
import * as validate from './general_functions.js';

// Declaration of Elements constant variables
// const  = document.getElementById('');
const name_input = document.getElementById('name_input');
const edad_input = document.getElementById('edad_input');
const num_doc_input = document.getElementById('num_doc_input');
const email_input = document.getElementById('email_input');
const num_cell_input = document.getElementById('num_cell_input');
const salud_input = document.getElementById('salud_input');
const direccion_input = document.getElementById('direccion_input');
const padece_enf_radio_opt1 = document.getElementById('padece_enf_radio_opt1');
const padece_enf_radio_opt2 = document.getElementById('padece_enf_radio_opt2');
const enf_expli_container = document.getElementById('enf_expli_container');
const alergia_radio_opt1 = document.getElementById('alergia_radio_opt1');
const alergia_radio_opt2 = document.getElementById('alergia_radio_opt2');
const alergia_expli_container = document.getElementById('alergia_expli_container');
const contact_emer_1_nombre = document.getElementById('contact_emer_1-nombre');
const contact_emer_1_cell = document.getElementById('contact_emer_1-cell');
const contact_emer_2_nombre = document.getElementById('contact_emer_2-nombre');
const contact_emer_2_cell = document.getElementById('contact_emer_2-cell');
const textareas = document.getElementsByTagName('textarea');
const censo_form = document.getElementById('censo_form');

// Error msgs
const error_cell_msg_apr = document.getElementById('error_cell_msg_apr');
const error_cell_msg_con1 = document.getElementById('error_cell_msg_con1');
const error_cell_msg_con2 = document.getElementById('error_cell_msg_con2');
const error_id_msg_apr = document.getElementById('error_id_msg_apr');


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

// Input ID number validation
num_doc_input.addEventListener('input', () => {

    // MaxLength
    validate.limit_length(num_doc_input, 10);

    // Only numbers validation
    validate.only_numbers(num_doc_input);

    
    // Remove error
    num_doc_input.classList.remove('id_error');
    error_id_msg_apr.classList.add('hide_error_id_msg');
    error_id_msg_apr.classList.remove('show_error_id_msg');
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
})

// Radio Illness
padece_enf_radio_opt1.addEventListener('click', () => {
    validate.show_textarea(enf_expli_container);
});

padece_enf_radio_opt2.addEventListener('click', () => {
    validate.hide_textarea(enf_expli_container);
});

// Radio Allergies
alergia_radio_opt1.addEventListener('click', () => {
    validate.show_textarea(alergia_expli_container);
});

alergia_radio_opt2.addEventListener('click', () => {
    validate.hide_textarea(alergia_expli_container);
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

// Id and phone number vaildation
censo_form.addEventListener('submit', function (event) {
    let num_cell_apr = num_cell_input.value;
    let contact_1_cell = contact_emer_1_cell.value;
    let contact_2_cell = contact_emer_2_cell.value;
    let num_doc = num_doc_input.value;

    if ((num_cell_apr.length != 7 && num_cell_apr.length != 10) || (contact_1_cell.length != 7 && contact_1_cell.length != 10) || (contact_2_cell.length != 7 && contact_2_cell.length != 10 && contact_2_cell.length != 0) || (num_doc.length < 8)) {
        event.preventDefault();

        if(num_doc.length < 8) {
            num_doc_input.classList.add('id_error');
            error_id_msg_apr.classList.remove('hide_error_id_msg');
            error_id_msg_apr.classList.add('show_error_id_msg');
        }

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

censo_form.addEventListener('reset', () => {
    // Remove error
    // id
    num_doc_input.classList.remove('id_error');
    error_id_msg_apr.classList.add('hide_error_id_msg');
    error_id_msg_apr.classList.remove('show_error_id_msg');
    

    // num cel apr
    num_cell_input.classList.remove('cell_error');
    error_cell_msg_apr.classList.add('hide_error_num_msg');
    error_cell_msg_apr.classList.remove('show_error_num_msg');

    // contact 1
    contact_emer_1_cell.classList.remove('cell_error');
    error_cell_msg_con1.classList.add('hide_error_num_msg');
    error_cell_msg_con1.classList.remove('show_error_num_msg');
    
    // contact 2
    contact_emer_2_cell.classList.remove('cell_error');
    error_cell_msg_con2.classList.remove('show_error_num_msg');
    error_cell_msg_con2.classList.add('hide_error_num_msg');
});