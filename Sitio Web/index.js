/*========= NAV ============*/
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //links animacion
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //animacion burger
    hamburger.classList.toggle("toggle");
});

 /*========= LOGIN ==========*/
 document.querySelector("#show_login").addEventListener("click", function(){
  document.querySelector(".popup").classList.add("active");
});

document.querySelector(".popup .close_btn").addEventListener("click", function(){
  document.querySelector(".popup").classList.remove("active");
});

var formulario = document.getElementsByName("form_login")[0];

function validarEmail(e){
  if(formulario.email.value == "" || formulario.email.value == 0){
      alert("Completa el campo email")
      e.preventDefault();
  }
}

function validarPassword(e){
  if(formulario.password.value == "" || formulario.password.value == 0){
      alert("Completa el campo password")
      e.preventDefault();
  }
}

function validar(e)
        {
            validarEmail(e);
            validarPassword(e)
        }

        formulario.addEventListener("submit",validar);



/*========== SCROLL REAVEAL =============*/
  window.sr = ScrollReveal();

  /*nav y banner*/

  sr.reveal('.content', {  //aqui selecciona a que clase deseas darle el scroll reveal
    duration: 1000,
    //desde donde queremos que vaya, abajo, izq, dere, etc
    origin: 'bottom',
    //desde que parte queremos que se haga la animacion
    distance: '-100px'
  });

  sr.reveal('.titulo_banner', {  
    duration: 1000,
    origin: 'bottom',
    distance: '-100px'
  });

  sr.reveal('.parrafo_banner', {  
    duration: 1000,
    origin: 'bottom',
    distance: '-100px'
  });

  sr.reveal('#show_login', {  
    duration: 1000,
    origin: 'bottom',
    distance: '-100px'
  });

  sr.reveal('.indicator', {  
    duration: 1000,
    origin: 'bottom',
    distance: '-100px'
  });

  /*secciones*/
  sr.reveal('.contenido_img', {  
    duration: 3000,
    origin: 'left',
    distance: '-400px'
  });

  sr.reveal('.contenido1_info', {  
    duration: 3000,
    origin: 'right',
    distance: '-400px'
  });

  /*slider*/
  ScrollReveal().reveal('.container', {
    rotate: {
        x: 0,
        y: 3000
    }
  });

  ScrollReveal().reveal('.container2', {
    rotate: {
        x: 0,
        y: 3000
    }
  });

  ScrollReveal().reveal('.container3', {
    rotate: {
        x: 0,
        y: 3000
    }
  });

  ScrollReveal().reveal('.container4', {
    rotate: {
        x: 0,
        y: 3000
    }
  });



