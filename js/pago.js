document.getElementById('paymentForm').addEventListener('submit', function(event) {
  event.preventDefault();
  
  const cardNumber = document.getElementById('cardNumber').value;
  const cardNumberError = document.getElementById('cardNumberError');
  
  if (cardNumber.length < 15 || cardNumber.length > 19) {
      cardNumberError.textContent = 'El número de tarjeta debe tener entre 15 y 19 dígitos.';
      cardNumberError.style.display = 'block';
  } else {
      cardNumberError.style.display = 'none';

      // Crear un objeto FormData con los datos del formulario
      let formData = new FormData(this);

      // Enviar el formulario usando Fetch API
      fetch('procesar_pago.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => {
          document.body.innerHTML = data; // Muestra la respuesta del servidor
      })
      .catch(error => console.error('Error:', error));
  }
});


