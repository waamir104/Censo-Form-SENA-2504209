//        Censo - Form   --version 1.0 
// William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023 


// General functions

// Limit the length of the elements value
function limit_length(object, maxLength) {
    if (object.value.length > maxLength) {
        object.value = object.value.slice(0, maxLength);
    }
}

// Allow just numbers
function only_numbers(object) {
    let regex = /[^0-9]/g;

    if (object.value.match(regex)) {
        object.value = object.value.replace(regex, '')
    }
}

// Change the visibility of the hidden textarea
function show_textarea(object) {
    object.style.display = 'block';
}

function hide_textarea(object) {
    object.style.display = 'none';
}

// Validates names
function only_letters(object) {

    let characters = /[~!@#$%^&*()_+|}{[\]\\\/?><:"`;.,'0-9]/g;

    if (object.value.match(characters)) {
        let new_value = object.value.replaceAll(characters, '');
        object.value = new_value;
    }
}

export {limit_length, only_numbers, only_letters, show_textarea, hide_textarea};