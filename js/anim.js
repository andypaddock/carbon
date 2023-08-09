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
  gsap.to(".cloud-four", {
    scrollTrigger: {
      trigger: ".base-video",
      start: "top bottom",
      end: "bottom top",
      scrub: true,
    },
    y: -500,
    // Adjust the value to control the cloud's movement
    scale: 1.4, // Adjust the value to control the cloud's scaling
  });
  gsap.to(".cloud-five", {
    scrollTrigger: {
      trigger: ".base-video",
      start: "top bottom",
      end: "bottom top",
      scrub: true,
    },
    y: -600,
    // Adjust the value to control the cloud's movement
    scale: 1.7, // Adjust the value to control the cloud's scaling
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

  // GSAP animation code
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".video-img",
      start: "bottom center",
      scrub: 1,
    },
  });

  tl.to(".video-img", {
    translate: "0 0", // Change this to your desired translation values
    ease: "power2.inOut",
  });

  tl.to(".video-img", {
    width: "100%",
    paddingLeft: 0,
    ease: "power2.inOut",
    // delay: 0.5, // Adjust the delay value as needed (in seconds)
  });
});

// GSAP Animation replace ScrollReveal
const animateRight = document.querySelectorAll(".animate-right");

// Set initial position and opacity of divs
gsap.set(animateRight, { x: -40, opacity: 0 });

animateRight.forEach((div, index) => {
  gsap.to(div, {
    opacity: 1,
    x: 0,
    duration: 0.6,
    ease: "power2.out",
    scrollTrigger: {
      trigger: div,
      start: "top 80%", // Trigger animation when the div is 80% from the top of the viewport
      end: "bottom 20%", // End animation when the div is 20% from the bottom of the viewport
      toggleActions: "play none none reverse", // Play animation when in view, and reverse it when leaving view
      delay: index * 0.2, // Stagger the animation for each div
    },
  });
});

const animateLeft = document.querySelectorAll(".animate-left");

// Set initial position and opacity of divs
gsap.set(animateLeft, { x: 40, opacity: 0 });

animateLeft.forEach((div, index) => {
  gsap.to(div, {
    opacity: 1,
    x: 0,
    duration: 0.6,
    ease: "power2.out",
    scrollTrigger: {
      trigger: div,
      start: "top 80%", // Trigger animation when the div is 80% from the top of the viewport
      end: "bottom 20%", // End animation when the div is 20% from the bottom of the viewport
      toggleActions: "play none none reverse", // Play animation when in view, and reverse it when leaving view
      delay: index * 0.2, // Stagger the animation for each div
    },
  });
});

const animateTile = document.querySelectorAll(".animate-tile");

// Set initial position and opacity of divs
gsap.set(animateTile, { y: -100, opacity: 0 });

animateTile.forEach((div, index) => {
  gsap.to(div, {
    opacity: 1,
    y: 0,
    duration: 0.6,
    ease: "power2.out",
    scrollTrigger: {
      trigger: div,
      start: "top 80%", // Trigger animation when the div is 80% from the top of the viewport
      end: "bottom 20%", // End animation when the div is 20% from the bottom of the viewport
      toggleActions: "play none none reverse", // Play animation when in view, and reverse it when leaving view
      delay: index * 0.2, // Stagger the animation for each div
    },
  });
});

const animateDown = document.querySelectorAll(".animate-down");

// Set initial position and opacity of divs
gsap.set(animateDown, { y: -100, opacity: 0 });

animateDown.forEach((div, index) => {
  gsap.to(div, {
    opacity: 1,
    y: 0,
    duration: 0.6,
    ease: "power2.out",
    scrollTrigger: {
      trigger: div,
      start: "top 80%", // Trigger animation when the div is 80% from the top of the viewport
      end: "bottom 20%", // End animation when the div is 20% from the bottom of the viewport
      toggleActions: "play none none reverse", // Play animation when in view, and reverse it when leaving view
      delay: index * 0.2, // Stagger the animation for each div
    },
  });
});
