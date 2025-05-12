const movie = {
    title: "Captain America: Thế Giới Mới",
    description: "Mô tả phim: Siêu chiến binh mới chống lại bộ máy khủng khiếp...",
    duration: "120 phút",
    genre: "Hành động, Tâm lý",
    rating: 5,
    poster: "poster.jpg",
    trailer: "https://www.youtube.com/watch?v=YKW-GdM-JIw&t=11s"
  };

  const episodes = ["Tập 1", "Tập 2", "Tập 3", "Tập 4"];

  const related = ["poster1.jpg", "poster2.jpg", "poster3.jpg", "poster4.jpg", "poster5.jpg"];

  const detailDiv = document.getElementById("movieDetail");
  detailDiv.innerHTML = `
    <div>
      <img src="${movie.poster}" alt="Poster" class="w-full rounded-lg shadow" />
    </div>
    <div class="md:col-span-2">
      <div class="aspect-video bg-black mb-4 rounded-lg shadow">
        <iframe class="w-full h-full rounded-lg" src="${movie.trailer}" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="flex items-center gap-4 mb-4">
        <button class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">Xem ngay</button>
        <i class="fas fa-share-alt hover:text-yellow-400 cursor-pointer"></i>
      </div>
      <div class="text-sm space-y-1">
        <h2 class="text-xl font-bold">${movie.title}</h2>
        <p class="text-gray-300">${movie.description}</p>
        <p class="text-gray-400">Thời lượng: ${movie.duration} | Thể loại: ${movie.genre}</p>
        <p class="text-yellow-400">${"★".repeat(movie.rating)} (${movie.rating}/5)</p>
      </div>
    </div>
  `;

  const episodeList = document.getElementById("episodeList");
  episodes.forEach(ep => {
    const btn = document.createElement("button");
    btn.className = "px-3 py-1 text-sm bg-white/10 rounded hover:bg-yellow-400 hover:text-black transition";
    btn.innerText = ep;
    episodeList.appendChild(btn);
  });

  const relatedContainer = document.getElementById("relatedMovies");
  related.forEach(img => {
    const imgEl = document.createElement("img");
    imgEl.src = img;
    imgEl.className = "w-40 rounded-lg shadow shrink-0";
    relatedContainer.appendChild(imgEl);
  });