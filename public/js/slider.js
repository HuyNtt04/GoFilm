let currentIndex = 0;
const slider = document.getElementById('slider');
const totalSlides = slider.children.length;
const thumbs = document.querySelectorAll(".thumb");

function updateSlider() {
  slider.classList.remove("scale-[0.98]", "blur-sm");
  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
  setTimeout(() => {
    slider.classList.remove("scale-[0.98]", "blur-sm");
  }, 300);
  thumbs.forEach((thumb, i) => {
    thumb.classList.toggle("border-white", i === currentIndex);
    thumb.classList.toggle("border-2", i === currentIndex);
  });
}

function goToSlide(index) {
  currentIndex = index;
  updateSlider();
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % totalSlides;
  updateSlider();
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
  updateSlider();
}

setInterval(() => {
  nextSlide();
}, 7000);

updateSlider(); // Initialize state

    const mainHeader = document.getElementById("mainHeader");

    window.addEventListener("scroll", () => {
      if (window.scrollY > 60) {
        mainHeader.classList.add("bg-[#0e0f1a]/90", "backdrop-blur-md", "shadow-md");
      } else {
        mainHeader.classList.remove("bg-[#0e0f1a]/90", "backdrop-blur-md", "shadow-md");
      }
    });