document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const cardNumber = document.getElementById('cardNumber').value;
    const cardNumberError = document.getElementById('cardNumberError');
    
    if (cardNumber.length < 15 || cardNumber.length > 19) {
        cardNumberError.textContent = 'El número de tarjeta debe tener entre 15 y 19 dígitos.';
        cardNumberError.style.display = 'block';
    } else {
        cardNumberError.style.display = 'none';
        alert('Pago realizado con éxito');
        // Aquí puedes agregar la lógica para enviar el formulario
    }
});
