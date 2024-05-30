// Selecciona todos los elementos .service-box
const serviceBoxes = document.querySelectorAll('.service-box');

// Añade un evento de clic a cada .service-box
serviceBoxes.forEach(box => {
    box.addEventListener('click', () => {
        box.classList.toggle('flip');
    });
});

function filterServices(category) {
    const serviceBoxes = document.querySelectorAll('.service-box');
    serviceBoxes.forEach(box => {
        if (box.classList.contains(category) || category === 'all') {
            box.style.display = 'block';
        } else {
            box.style.display = 'none';
        }
    });
}


function filterServices(category) {
    const serviceBoxes = document.querySelectorAll('.service-box');
    serviceBoxes.forEach(box => {
        if (category === 'all' || box.classList.contains(category)) {
            box.style.display = 'block';
        } else {
            box.style.display = 'none';
        }
    });
}

