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


