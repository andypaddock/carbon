//@prepros-prepend fslightbox.js
//@prepros-prepend slick.min.js
//@prepros-prepend scrollreveal.js


jQuery(document).ready(function($) {


  
 
  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements










  //=========== Slick Slider

$('.testimonial-carousel').slick({
  centerMode: false,
  centerPadding: '125px',
  slidesToShow: 1,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
  // responsive: [
  //   {
  //     breakpoint: 768,
  //     settings: {
  //       arrows: false,
  //       centerMode: true,
  //       centerPadding: '40px',
  //       slidesToShow: 1
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       arrows: false,
  //       centerMode: true,
  //       centerPadding: '40px',
  //       slidesToShow: 1
  //     }
  //   }
  // ]
});

$('.hero-slider').slick({
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear',
  autoplay: true,
  autoplaySpeed: 7000,
  arrows:false,
});







  //=========== Scroll Reveal






var slideLeft = {
    distance: "40px",
    origin: "left",
    opacity: 0.0,
    duration: 1000,
    delay: 250,
    mobile: false,
  };
  var slideRight = {
    distance: "40px",
    origin: "right",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideUp = {
    distance: "40px",
    origin: "bottom",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var tileDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1500,
    mobile: false,
    interval: 40,
  };

  ScrollReveal().reveal(".fmleft", slideLeft);
  ScrollReveal().reveal(".fmtop", slideDown);
  ScrollReveal().reveal(".fmbottom", slideUp);
  ScrollReveal().reveal(".fmright", slideRight);
  ScrollReveal().reveal(".tile", tileDown);
  ScrollReveal().reveal(".row-default", slideRight);
  ScrollReveal().reveal(".row-reverse", slideLeft);








//==============BLOG READ MORE AJAX CALL


var ppp = 6; // Post per page
var pageNumber = 1;


function load_posts(){
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajax-posts").append($data);
                //$("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
                $("#more_posts").hide(); // This will hide the button once all posts have been loaded
            } else{
                $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();
    $(this).insertAfter('#ajax-posts'); // Move the 'Load More' button to the end of the the newly added posts.
});




$(".toggle-block label").click(function () {
    var otherLabels = $(this).parent().siblings(".item").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });










var containerEl = document.querySelector(".gallery-wrapper");
  var mixer;

  if (containerEl) {
    mixer = mixitup(containerEl, {
      // multifilter: {
      //   enable: true,
      // },
    });
  }






}); //Don't remove ---- end of jQuery wrapper


//COUNTER

function countUp() {
  const elements = document.querySelectorAll('.counter');

  elements.forEach(element => {
    const startNumber = parseInt(element.dataset.start);
    const endNumber = parseInt(element.dataset.end);
    const increment = parseInt(element.dataset.increment) || 1; // Default increment is 1 if not specified
    const intervalDuration = parseInt(element.dataset.intervalDuration) || 1000; // Default interval duration is 1000 milliseconds (1 second)
    const prefix = element.dataset.prefix || ''; // Text to prepend (empty string by default)
    const suffix = element.dataset.suffix || ''; // Text to append (empty string by default)
    let currentNumber = startNumber;

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.target === element && entry.isIntersecting) {
          const intervalId = setInterval(() => {
            if (currentNumber > endNumber) {
              clearInterval(intervalId);
            } else {
              element.querySelector('span').textContent = prefix + currentNumber + suffix;
              currentNumber += increment;
            }
          }, intervalDuration);

          observer.unobserve(element);
        }
      });
    });

    observer.observe(element);
  });
}

window.onload = countUp;


//FADE FOOTER HEADINGS 

// Get all the fade items
const fadeItems = document.querySelectorAll('.fade-item');

// Set the initial active index
let activeIndex = 0;

// Function to fade the headings
function fadeHeadings() {
  // Remove active class from all fade items
  fadeItems.forEach(item => item.classList.remove('active'));

  // Add active class to the current heading
  fadeItems[activeIndex].classList.add('active');

  // Increment the active index
  activeIndex = (activeIndex + 1) % fadeItems.length;
}

// Call the fadeHeadings function every 3 seconds
setInterval(fadeHeadings, 3000);
