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
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (n) {
      slideIndex = n;
  }

  if (slideIndex > slides.length) {
      slideIndex = 1;
  }
  if (slideIndex < 1) {
      slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";

  setTimeout(showSlides, 5000); // Change image every 5 seconds
}

// Initially, start the slideshow
function startSlideshow() {
  showSlides();
}

startSlideshow();

