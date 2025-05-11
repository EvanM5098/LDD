window.addEventListener("scroll", () => {
    document.querySelectorAll(".slide-left, .slide-right").forEach(el => {
      const top = el.getBoundingClientRect().top;
      const isVisible = top < window.innerHeight - 100;
      if (isVisible) {
        el.classList.add("visible");
      }
    });
  });
  