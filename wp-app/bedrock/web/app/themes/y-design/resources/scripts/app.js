import Alpine from 'alpinejs'
 
window.Alpine = Alpine

document.addEventListener("DOMContentLoaded", function() { 
    Alpine.start()
    //do work
});

const clicked = document.getElementById("dropdown-depth-one");
