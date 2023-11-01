//MOVE TO GREENSOCK

// Create the ScrollTrigger
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

// Define the base-video element
const baseVideo = document.querySelector(".base-video");
const firstVideo = baseVideo.querySelector("#intro"); // Assuming the video has the ID 'intro'
const challengeVideo = document.getElementById("challenge");

// Create a timeline for the pinning animation
const pinTimeline = gsap.timeline({
  scrollTrigger: {
    trigger: baseVideo,
    start: "top top", // Pinning starts when the top of the element reaches the top of the viewport
    // end: "bottom center",
    pin: true,
    scrub: true, // Enables scrubbing effect
    // markers: true, // Adds markers for debugging
    onUpdate: (self) => {
      const progress = self.progress; // Get the scroll trigger's progress

      // Ensure firstVideo has a valid duration
      if (!isNaN(firstVideo.duration)) {
        const videoTime = progress * firstVideo.duration;

        // Ensure videoTime is a valid number
        if (!isNaN(videoTime) && isFinite(videoTime)) {
          firstVideo.currentTime = videoTime; // Set the video's current time based on scrolling progress
        }
      }
    },
  },
});

// Function to set up the ScrollTrigger animation

const videoImg = document.querySelector(".video-img");
const projectVideo = document.getElementById("projectvideo");
const projectWrapper = document.querySelector(".panel-project");

const vtl = gsap.timeline({
  scrollTrigger: {
    trigger: ".panel-four-video",
    start: "top top", // Adjust start position as needed
    end: "bottom top",
    scrub: true,
    pin: true,
    pinSpacing: "margin",
    // markers: true,
    onUpdate: (self) => {
      const progress = self.progress; // Get the scroll trigger's progress

      // Ensure firstVideo has a valid duration
      if (!isNaN(projectVideo.duration)) {
        const projectTime = progress * projectVideo.duration;

        // Ensure videoTime is a valid number
        if (!isNaN(projectTime) && isFinite(projectTime)) {
          projectVideo.currentTime = projectTime; // Set the video's current time based on scrolling progress
        }
      }
    },
  },
});

vtl.to(projectVideo, { opacity: 1, duration: 0.1 });

// vtl.to(videoImg, {
//   opacity: 0,
//   duration: 0.5,
// });
// vtl.to(videoImg, {
//   zIndex: -1,
// });
vtl.to(projectWrapper, {
  opacity: 0,
  duration: 0.5,
  zIndex: -1,
});

gsap.to(".cloud-one img", {
  scrollTrigger: {
    trigger: ".hero",
    start: "top top",
    end: "bottom top",
    scrub: true,
  },
  y: -200,
  // Adjust the value to control the cloud's movement
  scale: 3, // Adjust the value to control the cloud's scaling
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

const videoAnimation = gsap.timeline({
  paused: true,
  defaults: { ease: "power2.inOut" }, // You can adjust the easing function
});

// videoAnimation.fromTo(".video-img--wrapper", {}, {});

videoAnimation.fromTo(
  ".video-img--wrapper",
  { y: "-150vh", width: "0%", height: "0%", opacity: "0" },
  { y: 0, width: "100%", height: "100%", opacity: "1", duration: 20 }
);

ScrollTrigger.create({
  trigger: ".video-img--wrapper",
  start: "center center", // Adjust the start position as needed
  endTrigger: "#projectvideo",
  end: "top top", // Adjust the end position as needed
  animation: videoAnimation, // Use the timeline as the animation
  scrub: true, // Set scrub to 1 to make the animation follow the scroll position
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

gsap.to(".project-intro", {
  yPercent: -50,
  ease: "none",
  scrollTrigger: {
    trigger: ".project--panel-one-wrapper",
    start: "top bottom", // the default values
    end: "bottom top",
    scrub: true,
  },
});

const staggerElements = document.querySelectorAll(".stagger");

if (staggerElements.length > 0) {
  // Color blocks
  ScrollTrigger.batch(".stagger", {
    // interval: 0.1, // time window (in seconds) for batching to occur
    onEnter: (batch) =>
      gsap.from(batch, {
        opacity: 0,
        y: 100,
        stagger: { each: 0.15 },
        overwrite: true,
      }),
    onLeaveBack: (batch) =>
      gsap.set(batch, { opacity: 1, y: 0, overwrite: true }),
    end: "35% center",
  });
}

const animateGoal = document.querySelectorAll(".goal");

// Set initial position and opacity of divs
gsap.set(animateGoal, { opacity: 0.5, filter: "saturate(0.5)" });

animateGoal.forEach((div, index) => {
  gsap.to(div, {
    opacity: 1,
    filter: "saturate(0.5)",
    duration: 0.6,
    ease: "power2.out",

    scrollTrigger: {
      trigger: div,
      start: "top center", // Trigger animation when the div is 80% from the top of the viewport
      end: "bottom center", // End animation when the div is 20% from the bottom of the viewport
      toggleActions: "play reverse play reverse", // Play animation when in view, and reverse it when leaving view
    },
  });
});

// GSAP Animation replace ScrollReveal
const explainerLeft = document.querySelectorAll(".explainer p");

if (explainerLeft.length >= 3) {
  const firstThreeParagraphs = Array.from(explainerLeft).slice(0, 3);

  // Now you have an array containing the first three <p> elements.
  // You can loop through or manipulate them as needed.
  // Set initial position and opacity of divs
  gsap.set(firstThreeParagraphs, { x: -40, opacity: 0 });

  firstThreeParagraphs.forEach((div, index) => {
    gsap.to(div, {
      opacity: 1,
      x: 0,
      duration: 0.6,
      ease: "power2.out",
      scrollTrigger: {
        trigger: div,
        start: "top 80%", // Trigger animation when the div is 80% from the top of the viewport
        end: "bottom 20%", // End animation when the div is 20% from the bottom of the viewport
        toggleActions: "play reverse play reverse", // Play animation when in view, and reverse it when leaving view
        delay: index * 0.2, // Stagger the animation for each div
      },
    });
  });
}

const explainerRight = document.querySelectorAll(".explainer p");

if (explainerRight.length > 3) {
  const paragraphsAfterFirstThree = Array.from(explainerRight).slice(3);

  // Set initial position and opacity of divs
  gsap.set(paragraphsAfterFirstThree, { x: 40, opacity: 0 });

  paragraphsAfterFirstThree.forEach((div, index) => {
    gsap.to(div, {
      opacity: 1,
      x: 0,
      duration: 0.6,
      ease: "power2.out",
      scrollTrigger: {
        trigger: div,
        start: "top 80%", // Trigger animation when the div is 80% from the top of the viewport
        end: "bottom 20%", // End animation when the div is 20% from the bottom of the viewport
        toggleActions: "play reverse play reverse", // Play animation when in view, and reverse it when leaving view
        delay: index * 0.2, // Stagger the animation for each div
      },
    });
  });
}

// // Select all elements with the class ".map-link"
// const mapLinks = document.querySelectorAll(".map-link");

// // Loop through each ".map-link" element and apply the GSAP animation individually
// mapLinks.forEach((mapLink) => {
//   gsap.to(mapLink, {
//     scrollTrigger: {
//       trigger: mapLink, // Use the current ".map-link" element as the trigger
//       start: "top center", // Start 5rem before the center
//       end: "bottom center", // End 5rem after the center
//       toggleClass: "active", // CSS class to toggle
//       scrub: true,
//     },
//   });
// });

gsap.to("#map", {
  position: "absolute",
  scrollTrigger: {
    trigger: ".section-news-feed",
    start: "top bottom", // the default values
    // endTrigger: ".section-news-feed",
    toggleActions: "play none none reverse", // Play animation when in view, and reverse it when leaving view
  },
});

function applyAnimationToBlock(blockId, triggerClass) {
  gsap.to(blockId, {
    color: "#9bd866",
    fontWeight: "700",
    fill: "#9bd866",
    opacity: 1,
    scrollTrigger: {
      trigger: triggerClass,
      start: "top center",
      end: "bottom center",
      toggleActions: "play reverse play reverse",
    },
  });
}

applyAnimationToBlock("#block-1", ".trigger-1");
applyAnimationToBlock("#block-2", ".trigger-2");
applyAnimationToBlock("#block-3", ".trigger-3");
applyAnimationToBlock("#block-4", ".trigger-4");
