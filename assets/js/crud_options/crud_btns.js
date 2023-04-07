//        Censo - Form   --version 1.0 
// William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023 


// Initialize btns
const apr_navbar_btn = document.getElementById('apr_navbar_btn');
const rd_navbar_btn = document.getElementById('rd_navbar_btn');
const upd_navbar_btn = document.getElementById('upd_navbar_btn');
const save_btn = document.getElementById('save_btn');
const cancel_btn = document.getElementById('cancel_btn');

// Event listeners

apr_navbar_btn.addEventListener('click', () =>{
// This code will send information to a php file where it will be processed
window.location = './backend/crud/aprendices.php';
});


rd_navbar_btn.addEventListener('click', () =>{
// This code will send information to a php file where it will be processed
window.location = './backend/crud/read.php';
});


upd_navbar_btn.addEventListener('click', () =>{
// This code will send information to a php file where it will be processed
window.location = './backend/crud/update.php';
});


cancel_btn.addEventListener('click', () => {
// This code will redirect the user to the aprendices list so the changes won't be saved
window.location = './backend/crud/aprendices.php';
});
