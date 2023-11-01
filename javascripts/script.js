// JavaScript for sidebar navigation
function openSideNav() {
  document.querySelector('.side-nav').style.width = '250px';
  document.getElementById("main").style.marginLeft = "250px";
}

function closeSideNav() {
  document.querySelector('.side-nav').style.width = '0';
  document.getElementById("main").style.marginLeft= "0";
}

window.addEventListener("DOMContentLoaded", function() {
  const footer = document.getElementById("footer");

  function adjustFooterPosition() {
    const isContentFull = document.body.offsetHeight <= window.innerHeight;
    if (isContentFull) {
      footer.style.position = "fixed";
      footer.style.bottom = "0";
    } else {
      footer.style.position = "relative";
    }
  }

  window.addEventListener("resize", adjustFooterPosition);
  adjustFooterPosition();
});


/*
*
*/
// JavaScript for the slideshow container
let slideIndex = 0;
showSlides();

function plusSlides(n) {
showSlides((slideIndex += n));
}

function currentSlide(n) {
showSlides((slideIndex = n));
}

function showSlides(n) {
let i;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");

if (n >= slides.length) {
  slideIndex = 0;
  resetInterval();
}
if (n < 0) {
  slideIndex = slides.length - 1;
  resetInterval();
}

for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
}

for (i = 0; i < dots.length; i++) {
  dots[i].className = dots[i].className.replace(" active", "");
}

slides[slideIndex].style.display = "block";
dots[slideIndex].className += " active";
}

// Automatically change slides every 5 seconds
let slideInterval = setInterval(function () {
plusSlides(1);
}, 5000);

function resetInterval() {
clearInterval(slideInterval)
slideInterval=setInterval(function () {
  plusSlides(1);
  }, 5000);
}
