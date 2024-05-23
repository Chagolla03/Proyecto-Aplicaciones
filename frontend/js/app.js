const registrarForm = document.getElementById('registrarForm') || null
const loginForm = document.getElementById('loginForm') || null
const btnSignUp = document.getElementById('SignUp') || null

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

if(loginForm){
  loginForm.addEventListener('submit', (event)=> {
    event.preventDefault() //para hacer refresh
    const form = new FormData(loginForm)

    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })
    .then((response) => response.json())
    .then((res) => {
      console.log('@@ res =>', res)
      if(res.message == 'Inicio Satisfactorio'){
      }
    })
    .catch((err) => {
      console.log('@@ err =>', err)
    })
  })
}

//Si le da click en el boton registrar
if(btnSignUp){
  btnSignUp.addEventListener('click', ()=> {
    window.location.href = '../frontend/registro.html';
  })
}