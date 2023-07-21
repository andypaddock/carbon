//@prepros-prepend fslightbox.js
//@prepros-prepend slick.min.js
//@prepros-prepend scrollreveal.js
//@prepros-prepend mixitup.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend mixitup-multifilter.js

jQuery(document).ready(function ($) {
  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements

  //=========== Slick Slider

  $(".testimonial-carousel").slick({
    centerMode: false,
    centerPadding: "125px",
    slidesToShow: 1,
    prevArrow:
      "<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
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

  $(".timeline").slick({
    slidesToShow: 3,
    prevArrow:
      "<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
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
    // distance: "40px",
    // origin: "top",
    // opacity: 0.0,
    // duration: 1500,
    // mobile: false,
    // interval: 40,
    duration: 600,
    distance: "50px",
    easing: "ease-out",
    origin: "bottom",
    opacity: 0.0,
    reset: true,
    scale: 1,
    viewFactor: 0,
    interval: 50,
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

  function load_posts() {
    pageNumber++;
    var str =
      "&pageNumber=" + pageNumber + "&ppp=" + ppp + "&action=more_post_ajax";
    $.ajax({
      type: "POST",
      dataType: "html",
      url: ajax_posts.ajaxurl,
      data: str,
      success: function (data) {
        var $data = $(data);
        if ($data.length) {
          $("#ajax-posts").append($data);
          //$("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
          $("#more_posts").hide(); // This will hide the button once all posts have been loaded
        } else {
          $("#more_posts").attr("disabled", true);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      },
    });
    return false;
  }

  $("#more_posts").on("click", function () {
    // When btn is pressed.
    $("#more_posts").attr("disabled", true); // Disable the button, temp.
    load_posts();
    $(this).insertAfter("#ajax-posts"); // Move the 'Load More' button to the end of the the newly added posts.
  });

  $(".toggle-block label").click(function () {
    var otherLabels = $(this).parent().siblings(".item").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });

  var containerEl = document.querySelector(".files-wrapper");
  var mixer;

  if (containerEl) {
    mixer = mixitup(containerEl, {
      pagination: {
        limit: 8, // impose a limit of 8 targets per page
        maintainActivePage: false,
        loop: true,
        hidePageListIfSinglePage: true,
      },
    });
  }

  var containerNews = document.querySelector(".news-content");
  var mixerNews;

  if (containerNews) {
    mixerNews = mixitup(containerNews, {
      pagination: {
        limit: 6, // impose a limit of 8 targets per page
        maintainActivePage: false,
        loop: true,
        hidePageListIfSinglePage: true,
      },
      multifilter: {
        enable: true, // enable the multifilter extension for the mixer
      },
    });
  }
}); //Don't remove ---- end of jQuery wrapper

//COUNTER

function countUp() {
  const elements = document.querySelectorAll(".counter");

  elements.forEach((element) => {
    const startNumber = parseInt(element.dataset.start);
    const endNumber = parseInt(element.dataset.end);
    const increment = parseInt(element.dataset.increment) || 1; // Default increment is 1 if not specified
    const intervalDuration = parseInt(element.dataset.intervalDuration) || 1000; // Default interval duration is 1000 milliseconds (1 second)
    const prefix = element.dataset.prefix || ""; // Text to prepend (empty string by default)
    const suffix = element.dataset.suffix || ""; // Text to append (empty string by default)
    let currentNumber = startNumber;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.target === element && entry.isIntersecting) {
          const intervalId = setInterval(() => {
            if (currentNumber > endNumber) {
              clearInterval(intervalId);
            } else {
              element.querySelector("span").textContent =
                prefix + currentNumber + suffix;
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
const fadeItems = document.querySelectorAll(".fade-item");

// Set the initial active index
let activeIndex = 0;

// Function to fade the headings
function fadeHeadings() {
  // Remove active class from all fade items
  fadeItems.forEach((item) => item.classList.remove("active"));

  // Add active class to the current heading
  fadeItems[activeIndex].classList.add("active");

  // Increment the active index
  activeIndex = (activeIndex + 1) % fadeItems.length;
}

// Call the fadeHeadings function every 3 seconds
setInterval(fadeHeadings, 3000);

//MOVE TO GREENSOCK

// When the page is fully loaded
window.addEventListener("load", function () {
  // Select the necessary elements
  const videoElement = document.querySelector(".base-video");
  const panelOneSection = document.querySelector(".base-video");
  const videoFile = document.getElementById("intro");
  const challengeVideo = document.getElementById("challenge");

  // Set initial state of the video element
  // gsap.set(videoElement, { position: 'fixed', bottom: 0 });

  // Create the ScrollTrigger
  gsap.registerPlugin(ScrollTrigger);

  // Add ScrollTrigger animation
  gsap.to(videoElement, {
    scrollTrigger: {
      trigger: panelOneSection,
      start: "top center", // Start the animation when panel-one section enters the viewport
      end: "bottom bottom", // End the animation when panel-one section leaves the viewport
      onEnter: () => {
        // videoElement.style.position = 'absolute'; // When panel-one section enters the viewport, remove fixed positioning
        gsap.to(videoElement, {
          filter: "grayscale(0)",
          opacity: 1,
          duration: 2,
        }); // Change grayscale to 0 when entering
      },
      onLeaveBack: () => {
        // videoElement.style.position = 'fixed'; // When panel-one section leaves the viewport, revert to fixed positioning
        gsap.to(videoElement, {
          filter: "grayscale(1)",
          opacity: 0.6,
          duration: 2,
        }); // Change grayscale back to 1 when leaving
      },
    },
  });

  gsap.to(videoFile, {
    scrollTrigger: {
      trigger: panelOneSection,
      start: "top center",
      onEnter: () => videoFile.play(), // Play the video when the trigger enters the viewport
      onLeaveBack: () => videoFile.pause(), // Pause the video when the trigger leaves the viewport
      onEnterBack: () => videoFile.play(), // Resume playing the video when the trigger re-enters the viewport
    },
  });

  gsap.to(".cloud-one", {
    scrollTrigger: {
      trigger: ".hero",
      start: "top center",
      end: "bottom center",
      scrub: true,
    },
    y: 200,
    // Adjust the value to control the cloud's movement
    scale: 1.9, // Adjust the value to control the cloud's scaling
    opacity: 1,
  });

  gsap.to(".cloud-two", {
    scrollTrigger: {
      trigger: ".hero",
      start: "top center",
      end: "bottom center",
      scrub: true,
    },
    y: 500,
    // Adjust the value to control the cloud's movement
    scale: 2.4, // Adjust the value to control the cloud's scaling
  });

  gsap.to("#block-1", {
    scrollTrigger: {
      trigger: ".block-1",
      // toggleActions: "play complete reverse reset",
      start: "top 50%",
      end: () => "+=" + this.document.querySelector(".block-1").offsetHeight,
      onEnter: () => {
        gsap.to("#block-1", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-1 h3", { color: "#9bd866" });
      },
      onEnterBack: () => {
        gsap.to("#block-1", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-1 h3", { color: "#9bd866" });
      },
      onLeave: () => {
        gsap.to("#block-1", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-1 h3", { color: "#ffffff" });
      },
      onLeaveBack: () => {
        gsap.to("#block-1", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-1 h3", { color: "#ffffff" });
      },
    },
  });

  gsap.to("#block-2", {
    scrollTrigger: {
      trigger: ".block-2",
      // toggleActions: "restart none none reverse",
      start: "top 50%",
      end: () => "+=" + this.document.querySelector(".block-2").offsetHeight,
      onEnter: () => {
        gsap.to("#block-2", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-2 h3", { color: "#9bd866" });
      },
      onEnterBack: () => {
        gsap.to("#block-2", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-2 h3", { color: "#9bd866" });
      },
      onLeave: () => {
        gsap.to("#block-2", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-2 h3", { color: "#ffffff" });
      },
      onLeaveBack: () => {
        gsap.to("#block-2", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-2 h3", { color: "#ffffff" });
      },
    },
  });
  gsap.to("#block-3", {
    scrollTrigger: {
      trigger: ".block-3",
      // toggleActions: "restart none none reverse",
      start: "top 50%",
      end: () => "+=" + this.document.querySelector(".block-3").offsetHeight,
      onEnter: () => {
        gsap.to("#block-3", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-3 h3", { color: "#9bd866" });
      },
      onEnterBack: () => {
        gsap.to("#block-3", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-3 h3", { color: "#9bd866" });
      },
      onLeave: () => {
        gsap.to("#block-3", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-3 h3", { color: "#ffffff" });
      },
      onLeaveBack: () => {
        gsap.to("#block-3", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-3 h3", { color: "#ffffff" });
      },
    },
  });
  gsap.to("#block-4", {
    scrollTrigger: {
      trigger: ".block-4",
      // toggleActions: "restart none none reverse",
      start: "top 50%",
      end: () => "+=" + this.document.querySelector(".block-4").offsetHeight,
      onEnter: () => {
        gsap.to("#block-4", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-4 h3", { color: "#9bd866" });
      },
      onEnterBack: () => {
        gsap.to("#block-4", { fill: "#9bd866", opacity: 1, duration: 0.5 });
        gsap.to(".block-4 h3", { color: "#9bd866" });
      },
      onLeave: () => {
        gsap.to("#block-4", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-4 h3", { color: "#ffffff" });
      },
      onLeaveBack: () => {
        gsap.to("#block-4", { fill: "#ffffff", opacity: 0.4, duration: 0.5 });
        gsap.to(".block-4 h3", { color: "#ffffff" });
      },
    },
  });
  gsap.to(challengeVideo, {
    scrollTrigger: {
      trigger: "#challenge",
      start: "top center",
      onEnter: () => challengeVideo.play(), // Play the video when the trigger enters the viewport
      onLeaveBack: () => challengeVideo.pause(), // Pause the video when the trigger leaves the viewport
      onEnterBack: () => challengeVideo.play(), // Resume playing the video when the trigger re-enters the viewport
    },
  });

  // Get the video element
  const video = document.querySelector("#projectvideo");

  // Configure ScrollTrigger
  ScrollTrigger.create({
    trigger: video, // The element that triggers the animation
    start: "bottom bottom", // Animation starts when the top of the element reaches the center of the viewport
    end: "bottom 20%", // Animation ends when the bottom of the element reaches the center of the viewport
    pin: true, // Pin the element to the bottom of the viewport until animation ends
    pinSpacing: false, // Disable automatic adjustment of pin spacing
    onUpdate: (self) => {
      // Calculate the scroll progress within the trigger area
      const progress = self.progress.toFixed(2);

      // Adjust the opacity of the video based on scroll progress
      gsap.to(video, {
        opacity: 1 - progress, // Fade out the video as scroll progresses
        duration: 0.2,
      });
    },
  });

  var largeTL = gsap.timeline({
    scrollTrigger: {
      trigger: ".project--panel-one-wrapper",
      pin: ".project-image",
      pinSpacing: false,
      start: "top top",

      endTrigger: ".project-bleed",
      end: "top bottom",
    },
  });

  // gsap.to(".video-img", {
  //   scrollTrigger: {
  //     trigger: ".how-blocks",
  //     start: "bottom center",
  //     pin: ".video-img",
  //     pinSpacing: false,
  //   },

  //   width: "100%",
  // });
});

// Get all the anchor tags inside the "buttons" div
const buttons = document.querySelectorAll(".buttons a");

// Add a click event listener to each anchor tag
buttons.forEach((button) => {
  button.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent default link behavior

    // Remove the "active" class from all other elements
    buttons.forEach((btn) => {
      btn.classList.remove("active");
    });

    // Add the "active" class to the clicked button
    this.classList.add("active");

    // Get the corresponding area-link using the button's ID
    const buttonId = this.id;
    const areaLink = document.querySelector(".area-link." + buttonId);

    // Remove the "active" class from all other area-links
    const areaLinks = document.querySelectorAll(".area-link");
    areaLinks.forEach((link) => {
      link.classList.remove("active");
    });

    // Add the "active" class to the corresponding area-link
    areaLink.classList.add("active");
  });
});

// Get all off-canvas elements
const offcanvasElements = document.querySelectorAll(".offcanvas");

// Function to handle link clicks
function handleLinkClick(event) {
  event.preventDefault();

  const target = event.currentTarget.getAttribute("href"); // Get the target off-canvas id

  // Add "active" class to the target off-canvas element and remove it from others
  offcanvasElements.forEach((offcanvas) => {
    if (offcanvas.id === target.substring(1)) {
      offcanvas.classList.add("active");
    } else {
      offcanvas.classList.remove("active");
    }
  });
}

// Function to handle close button clicks
function handleCloseButtonClick(event) {
  const offcanvas = event.currentTarget.parentElement;
  offcanvas.classList.remove("active");
}

// Example: Add click event listeners to all links with the 'area-link' class
const links = document.querySelectorAll(".area-link a");
links.forEach((link) => {
  link.addEventListener("click", handleLinkClick);
});

// Example: Add click event listeners to all close buttons
const closeButtons = document.querySelectorAll(".close-button");
closeButtons.forEach((button) => {
  button.addEventListener("click", handleCloseButtonClick);
});
