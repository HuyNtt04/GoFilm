document.querySelectorAll('.group-carousel').forEach(group => {
  const track = group.querySelector('.carousel-track');
  const prevBtn = group.querySelector('.prev-btn');
  const nextBtn = group.querySelector('.next-btn');
  let currentIndex = 0;
  const visibleItems = 3;

  function updateSlide() {
    const totalItems = track.children.length;
    const offset = -(currentIndex * (100 / visibleItems));
    track.style.transform = `translateX(${offset}%)`;
    prevBtn.classList.toggle('hidden', currentIndex === 0);
    nextBtn.classList.toggle('hidden', currentIndex >= totalItems - visibleItems);
  }

  prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateSlide();
    }
  });

  nextBtn.addEventListener('click', () => {
    if (currentIndex < track.children.length - visibleItems) {
      currentIndex++;
      updateSlide();
    }
  });

  updateSlide();
});