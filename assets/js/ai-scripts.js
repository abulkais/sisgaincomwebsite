//   banner scripts
(function () {
  // pick the image (prefers .hero-rotatable if present)
  const img =
    document.querySelector(".hero-rotatable") ||
    document.querySelector(".home_hero_section .col-lg-5 img");
  if (!img) return;

  // settings
  const sensitivityX = 0.35; // horizontal responsiveness (bigger = more rotation)
  const sensitivityY = 0.35; // vertical responsiveness
  const maxTiltX = 18; // clamp rotateX  (up/down)
  const maxTiltY = 30; // clamp rotateY  (left/right)
  const returnOnLeave = true; // snap back when leaving

  let hovering = false;
  let lastX = 0;
  let lastY = 0;
  let rotX = 0; // rotateX degrees (up/down)
  let rotY = 0; // rotateY degrees (left/right)
  let raf = null;

  // apply transform (debounced with rAF for butter-smooth motion)
  function paint() {
    raf = null;
    img.style.transform = `rotateX(${rotX}deg) rotateY(${rotY}deg)`;
  }

  function schedulePaint() {
    if (raf) return;
    raf = requestAnimationFrame(paint);
  }

  function clamp(v, min, max) {
    return v < min ? min : v > max ? max : v;
  }

  function onEnter(e) {
    hovering = true;
    // seed starting point so the first delta is small
    lastX = e.clientX;
    lastY = e.clientY;
  }

  function onMove(e) {
    if (!hovering) return;

    const dx = e.clientX - lastX; // +dx => move right  -> rotateY+
    const dy = e.clientY - lastY; // +dy => move down   -> rotateX-

    lastX = e.clientX;
    lastY = e.clientY;

    // update rotations in the same direction as the pointer
    rotY = clamp(rotY + dx * sensitivityX, -maxTiltY, maxTiltY);
    rotX = clamp(rotX - dy * sensitivityY, -maxTiltX, maxTiltX); // minus: down tilts forward

    schedulePaint();
  }

  function onLeave() {
    hovering = false;
    if (returnOnLeave) {
      rotX = 0;
      rotY = 0;
      schedulePaint();
    }
  }

  // attach listeners only on the image, so movement happens ONLY while hovering it
  img.addEventListener("mouseenter", onEnter);
  img.addEventListener("mousemove", onMove);
  img.addEventListener("mouseleave", onLeave);

  // initial render (no rotation)
  schedulePaint();
})();

//   banner scripts end



// testimonial carousel scripts
const carousel = document.querySelector("#testimonialCarousel .carousel-inner");
let isDragging = false;
let startPos = 0;
let endPos = 0;

// Add no-select to entire body to prevent unwanted text selection
const body = document.body;

carousel.addEventListener("mousedown", (e) => {
  isDragging = true;
  startPos = e.clientX;
  body.classList.add("no-select"); // Prevent text selection
  carousel.classList.add("grabbing");
});

carousel.addEventListener("mouseup", (e) => {
  if (!isDragging) return;
  isDragging = false;
  endPos = e.clientX;
  body.classList.remove("no-select"); // Allow text selection again
  carousel.classList.remove("grabbing");

  const threshold = 50;
  if (endPos - startPos > threshold) {
    $("#testimonialCarousel").carousel("prev");
  } else if (startPos - endPos > threshold) {
    $("#testimonialCarousel").carousel("next");
  }
});

// Cancel drag on mouse leave
carousel.addEventListener("mouseleave", () => {
  if (isDragging) {
    isDragging = false;
    body.classList.remove("no-select");
    carousel.classList.remove("grabbing");
  }
});

// Touch support (optional)
carousel.addEventListener("touchstart", (e) => {
  startPos = e.touches[0].clientX;
});

carousel.addEventListener("touchend", (e) => {
  endPos = e.changedTouches[0].clientX;
  const threshold = 50;
  if (endPos - startPos > threshold) {
    $("#testimonialCarousel").carousel("prev");
  } else if (startPos - endPos > threshold) {
    $("#testimonialCarousel").carousel("next");
  }
});
// testimonial carousel scripts end

// development process reveal scripts
(function () {
  const section = document.querySelector(".development-process");
  if (!section) return;

  const cards = section.querySelectorAll(".process-card");

  // If user prefers reduced motion, just show everything
  const reduceMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;
  if (reduceMotion) {
    cards.forEach((c) => c.classList.add("reveal"));
    return;
  }

  // Use IntersectionObserver to trigger once when section enters view
  const io = new IntersectionObserver(
    (entries) => {
      const entry = entries[0];
      if (!entry.isIntersecting) return;

      // Staggered reveal
      cards.forEach((card, i) => {
        setTimeout(() => card.classList.add("reveal"), i * 350); // 350ms gap
      });

      io.disconnect(); // run only once
    },
    {
      threshold: 0.2,
    },
  );

  io.observe(section);
})();
// development process reveal scripts end

// <!-- techonolgoy filter tab -->

function openTechnology(evt4, TechName) {
  var l, technology_tabcontent, technology_tablinks;
  technology_tabcontent = document.getElementsByClassName(
    "technology_tabcontent",
  );
  for (l = 0; l < technology_tabcontent.length; l++) {
    technology_tabcontent[l].style.display = "none";
  }
  technology_tablinks = document.getElementsByClassName("technology_tablinks");
  for (l = 0; l < technology_tablinks.length; l++) {
    technology_tablinks[l].className = technology_tablinks[l].className.replace(
      " active",
      "",
    );
  }
  document.getElementById(TechName).style.display = "block";
  evt4.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("technologyOpen").click();

// <!-- techonolgoy filter tab end -->

// animated kpi counters
document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".ai-kpi-value");
  const duration = 5000; // 5 seconds

  counters.forEach((counter) => {
    const target = parseFloat(counter.getAttribute("data-target"));
    const decimals = counter.getAttribute("data-decimals")
      ? parseInt(counter.getAttribute("data-decimals"))
      : 0;
    const startTime = performance.now();

    function update(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const value = (target * progress).toFixed(decimals);

      counter.textContent =
        value + (counter.textContent.includes("%") ? "%" : "");

      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        // Add suffixes if needed
        if (counter.dataset.target.includes("+"))
          counter.textContent = counter.dataset.target;
        else if (decimals > 0) counter.textContent = target.toFixed(decimals);
        else
          counter.textContent =
            target +
            (counter.dataset.target.includes("%")
              ? "%"
              : counter.dataset.target.includes("+")
                ? "+"
                : "");
      }
    }
    requestAnimationFrame(update);
  });
});
// animated kpi counters end




// FAQ accordion scripts
/* Accessible accordion: one open at a time, smooth height animation, hash support */
(function () {
  const items = document.querySelectorAll(".ai-faq-item");

  function setOpen(item, open) {
    const btn = item.querySelector(".ai-faq-toggle");
    const panel = item.querySelector(".ai-faq-answer");

    // measure content height for smooth animation
    if (open) {
      btn.setAttribute("aria-expanded", "true");
      const inner = panel.firstElementChild;
      const h = inner
        ? inner.offsetHeight +
          parseInt(getComputedStyle(inner).paddingTop || 0) +
          parseInt(getComputedStyle(inner).paddingBottom || 0)
        : panel.scrollHeight;
      panel.style.height = h + "px";
    } else {
      btn.setAttribute("aria-expanded", "false");
      panel.style.height = "0px";
    }
  }

  // Close all except the one passed
  function closeOthers(except) {
    items.forEach((it) => {
      if (it !== except) setOpen(it, false);
    });
  }

  // Bind toggles
  items.forEach((item) => {
    const btn = item.querySelector(".ai-faq-toggle");
    const panel = item.querySelector(".ai-faq-answer");

    // start collapsed
    btn.setAttribute("aria-expanded", "false");
    panel.style.height = "0px";

    btn.addEventListener("click", () => {
      const isOpen = btn.getAttribute("aria-expanded") === "true";
      closeOthers(isOpen ? null : item);
      setOpen(item, !isOpen);
    });

    // Transition end fix to remove inline height when fully open (so it adapts to text wrap)
    panel.addEventListener("transitionend", () => {
      if (btn.getAttribute("aria-expanded") === "true") {
        panel.style.height = "auto";
      }
    });
  });

  // Deep link support (? or #q3 opens that item)
  function openFromHash() {
    const id = (location.hash || "").replace("#", "");
    if (!id) return;
    const btn = document.getElementById(id)?.querySelector(".ai-faq-toggle");
    const item = btn ? btn.closest(".ai-faq-item") : null;
    if (item) {
      closeOthers(item);
      setOpen(item, true);
      // ensure height becomes auto after animation
      const panel = item.querySelector(".ai-faq-answer");
      panel.addEventListener(
        "transitionend",
        () => (panel.style.height = "auto"),
        {
          once: true,
        },
      );
      item.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  }
  window.addEventListener("hashchange", openFromHash);
  openFromHash();
})();
// FAQ accordion scripts end
