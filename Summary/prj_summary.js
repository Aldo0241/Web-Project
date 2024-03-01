
// Chiamata alla funzione currentSlide all'avvio della pagina
document.addEventListener('DOMContentLoaded', function() {
    currentSlide(1); 
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}





document.addEventListener("DOMContentLoaded", getLocation);



function getLocation() {
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(showPosition);
	} else { 
	  document.getElementById("cityInfo").innerHTML = "Geolocation is not supported by this browser.";
	}
}

function showPosition(position) {

  //Definisco la variabile per la scrittura nel div desiderato
  var x = document.getElementById("cityInfo");

  //Acquisico le coordinate geografiche
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  //Stampa di prova dell'acquisizione precedente
  console.log(latitude);
	console.log(longitude);

  //Preparo la query per la decrittazione JNOSN
  let query = "latitude=" + latitude + "&longitude=" + longitude + "&localityLanguage=en";
  const  bigdatacloud_api = "https://api.bigdatacloud.net/data/reverse-geocode-client?" + query;

  //Preparo la richiesta AJAX
  const Http = new XMLHttpRequest();
  Http.open("GET", bigdatacloud_api);
  Http.send();
	Http.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      console.log(myObj);   //Stampa di prova
    
      x.innerHTML="Posizione utente : " + myObj.city;
      console.log("Posizione utente : " + myObj.city);
    }
	}

}