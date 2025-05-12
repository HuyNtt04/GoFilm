let currentIndex = 0;
    const visibleItems = 8;

    function updateCarousel() {
      const track = document.getElementById("carouselTrack");
      const totalItems = track.children.length;
      const offset = -(currentIndex * (100 / visibleItems));
      track.style.transform = `translateX(${offset}%)`;

      document.getElementById("prevBtn").classList.toggle("hidden", currentIndex === 0);
      document.getElementById("nextBtn").classList.toggle("hidden", currentIndex >= totalItems - visibleItems);
    }

    function nextSlide() {
      const track = document.getElementById("carouselTrack");
      if (currentIndex < track.children.length - visibleItems) {
        currentIndex++;
        updateCarousel();
      }
    }

    function prevSlide() {
      if (currentIndex > 0) {
        currentIndex--;
        updateCarousel();
      }
    }

    updateCarousel();