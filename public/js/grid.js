const movies = [
    {
      title: "Cuộc Chơi Mạo Hiểm",
      image: "images/TOP1.webp"
    },
    {
      title: "Bản Danh Sách Cuộc Đời",
      image: "images/TOP1.webp"
    },
    {
      title: "Bí Ẩn Thị Trấn Holland",
      image: "images/TOP1.webp"
    },
    {
      title: "Huyết Ân Truy Hạnh",
      image: "images/TOP1.webp"
    },
    {
      title: "Khải Thị",
      image: "images/TOP1.webp"
    },
    {
      title: "Siberia Bé Nhỏ",
      image: "images/TOP1.webp"
    },
    {
      title: "Batman Ninja Đối Đầu Liên Minh",
      image: "images/TOP1.webp"
    },
    {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      {
        title: "Batman Ninja Đối Đầu Liên Minh",
        image: "images/TOP1.webp"
      },
      
    {
      title: "Canh Bạc Cuối Cùng",
      image: "images/TOP1.webp"
    }
  ];
  

  const movieList = document.getElementById("movieList");

  movies.forEach(movie => {
    const card = document.createElement("div");
    card.className = "bg-white/5 rounded-md overflow-hidden shadow hover:scale-[1.02] transition duration-200";
    card.innerHTML = `
      <img src="${movie.image}" alt="${movie.title}" class="w-full h-60 object-cover">
      <div class="p-3">
        <p class="text-sm font-semibold">${movie.title}</p>
        <span class="inline-block mt-2 px-2 py-0.5 text-xs bg-white/10 rounded text-white">P.Đ.B</span>
      </div>
    `;
    movieList.appendChild(card);
  });