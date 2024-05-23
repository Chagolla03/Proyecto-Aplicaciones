const registrarForm = document.getElementById('registrarForm') || null


//Función para el registro
if(registrarForm){
  registrarForm.addEventListener('submit', (event)=> {
    event.preventDefault() //para hacer refresh 
    const form = new FormData(registrarForm)

    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })

    .then((response) => response.json())
    .then((res) => {
      console.log('@@ res =>', res)
      if (res.message === 'Usuario Registrado Satisfactoriamente'){
        window.location.href = '../frontend/login.html';
      }
    })
    .catch((err) => {
      console.log('@@ err =>', err)
    })
  })
}

