const top10Track = document.getElementById("top10Track");
const prevBtn = document.getElementById("prevTop10");
const nextBtn = document.getElementById("nextTop10");

let currentTopIndex = 0;
const visible = 1;
const itemWidthPercent = 20; // mỗi item chiếm 20%

function updateTop10() {
  const totalItems = top10Track.children.length;
  const offset = -(currentTopIndex * itemWidthPercent);
  top10Track.style.transform = `translateX(${offset}%)`;
  prevBtn.classList.toggle("hidden", currentTopIndex === 0);
  nextBtn.classList.toggle("hidden", currentTopIndex >= totalItems - visible);
}

function nextTop10() {
  const totalItems = top10Track.children.length;
  if (currentTopIndex < totalItems - visible) {
    currentTopIndex++;
    updateTop10();
  }
}

function prevTop10() {
  if (currentTopIndex > 0) {
    currentTopIndex--;
    updateTop10();
  }
}

updateTop10();