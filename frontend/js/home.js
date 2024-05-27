// Selecciona todos los elementos .service-box
const serviceBoxes = document.querySelectorAll('.service-box');

// Añade un evento de clic a cada .service-box
serviceBoxes.forEach(box => {
    box.addEventListener('click', () => {
        box.classList.toggle('flip');
    });
});
