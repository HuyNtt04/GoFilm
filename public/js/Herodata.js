// ==== HERO SLIDE AUTO FADE ====
let currentHeroIndex = 0;

function renderHeroSlide() {
  const slides = document.querySelectorAll(".hero-slide");
  slides.forEach((slide, i) => {
    slide.classList.remove("opacity-100");
    slide.classList.add("opacity-0");
    if (i === currentHeroIndex) {
      slide.classList.add("opacity-100");
    }
  });
}

setInterval(() => {
  currentHeroIndex = (currentHeroIndex + 1) % document.querySelectorAll(".hero-slide").length;
  renderHeroSlide();
}, 6000);

renderHeroSlide();

// ==== SUB CAROUSEL SLIDE EFFECT ====
document.querySelectorAll('[data-carousel]').forEach((wrapper) => {
  const track = wrapper.querySelector('[data-track]');
  const prev = wrapper.querySelector('[data-prev]');
  const next = wrapper.querySelector('[data-next]');
  const visible = 5;
  let index = 0;

  const updateSlide = () => {
    const offset = -(index * (100 / visible));
    track.style.transform = `translateX(${offset}%)`;
  };

  prev?.addEventListener("click", () => {
    if (index > 0) index--;
    updateSlide();
  });

  next?.addEventListener("click", () => {
    if (index < track.children.length - visible) index++;
    updateSlide();
  });

  updateSlide();
});


document.querySelectorAll('[data-carousel]').forEach((wrapper) => {
  const track = wrapper.querySelector('[data-track]');
  const prev = wrapper.querySelector('[data-prev]');
  const next = wrapper.querySelector('[data-next]');
  const visible = 5;
  let index = 0;

  const updateSlide = () => {
    const offset = -(index * (100 / visible));
    track.style.transform = `translateX(${offset}%)`;

    // Ẩn hoặc hiện nút khi chạm giới hạn
    if (index <= 0) {
      prev.classList.add("opacity-30", "pointer-events-none");
    } else {
      prev.classList.remove("opacity-30", "pointer-events-none");
    }

    if (index >= track.children.length - visible) {
      next.classList.add("opacity-30", "pointer-events-none");
    } else {
      next.classList.remove("opacity-30", "pointer-events-none");
    }
  };

  prev?.addEventListener("click", () => {
    if (index > 0) index--;
    updateSlide();
  });

  next?.addEventListener("click", () => {
    if (index < track.children.length - visible) index++;
    updateSlide();
  });

  updateSlide();
});
