import './bootstrap';

import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
// import 'tinymce/skins/content/default/content.min.css';
// import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';

window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#mytextarea',

        skin: false,
        content_css: false
    });
});

// Bootstrap modal 
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

const viewBtn = document.getElementById("viewBtn");
const notesContainers = document.querySelectorAll("#notesContainer");

viewBtn.addEventListener('click', (e) => {
    e.target.classList.toggle("fa-grip");
    notesContainers.forEach(e => {
        e.classList.toggle("col-md-4");
    });
})

// password show and hide visibility

function passwordVisible() {
    let x = document.getElementById("password1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
