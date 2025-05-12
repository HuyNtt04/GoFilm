@section('title', 'Trang Chủ')

@extends('../layouts.user')

@section('container')

    <div class="container_customer">
        {{-- banner --}}
        <section class="relative h-screen w-full overflow-hidden">
            <div id="slider" class="w-full h-full flex slider-container transition-all duration-500 ease-in-out">

                <!-- 🔹 Slide 1 -->
                <div class="w-full h-full relative flex-shrink-0">
                    <img src="images/thumbnail2.jpg" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent z-10"></div>
                    <div class="relative z-20 max-w-6xl mx-auto h-full flex flex-col justify-center px-6">
                        <h1 class="text-5xl font-bold mb-4">DAREDEVIL: TÁI XUẤT</h1>
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-yellow-400 text-black px-2 py-1 rounded text-sm font-medium">IMDb 8.8</span>
                            <span class="bg-white/10 border border-white/20 px-2 py-1 rounded text-sm">T18</span>
                            <span class="bg-white/10 border border-white/20 px-2 py-1 rounded text-sm">2025</span>
                        </div>
                        <p class="max-w-2xl text-gray-200 mb-6">
                            Matt Murdock, một luật sư mù với khả năng đặc biệt, chiến đấu cho công lý...
                        </p>
                        <div class="flex gap-4">
                            <a href="moviedetail.html"
                                class="inline-flex items-center bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold hover:bg-yellow-300 transition">
                                <i class="fas fa-play mr-2"></i> Xem ngay
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 🔹 Slide 2 -->
                <div class="w-full h-full relative flex-shrink-0">
                    <img src="images/thumbnail3.jpg" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent z-10"></div>
                    <div class="relative z-20 max-w-6xl mx-auto h-full flex flex-col justify-center px-6">
                        <h1 class="text-5xl font-bold mb-4">MICKEY 17</h1>
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-yellow-400 text-black px-2 py-1 rounded text-sm font-medium">IMDb 7.1</span>
                            <span class="bg-white/10 border border-white/20 px-2 py-1 rounded text-sm">T16</span>
                            <span class="bg-white/10 border border-white/20 px-2 py-1 rounded text-sm">2025</span>
                        </div>
                        <p class="max-w-2xl text-gray-200 mb-6">
                            Mickey Barnes là "nhân viên thay thế" thực hiện nhiệm vụ trên hành tinh băng giá...
                        </p>
                        <div class="flex gap-4">
                            <button class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold">
                                <i class="fas fa-play mr-2"></i> Xem ngay
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 🔹 Slide 1 + 2 -->
                @foreach ($twoLastestMovies as $lastestMovie)
                    <div class="w-full h-full relative flex-shrink-0">
                        <img src="{{ asset($lastestMovie->thumbnail) }}"
                            class="absolute inset-0 w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent z-10"></div>
                        <div class="relative z-20 max-w-6xl mx-auto h-full flex flex-col justify-center px-6">
                            <h1 class="text-5xl font-bold mb-4"> {{ $lastestMovie->title }} </h1>
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="bg-yellow-400 text-black px-2 py-1 rounded text-sm font-medium">IMDb 7.1</span>
                                <span class="bg-white/10 border border-white/20 px-2 py-1 rounded text-sm">T16</span>
                                <span class="bg-white/10 border border-white/20 px-2 py-1 rounded text-sm">2025</span>
                            </div>
                            <p class="max-w-2xl text-gray-200 mb-6">
                                {{ $lastestMovie->description }}...
                            </p>
                            <div class="flex gap-4">
                                <button class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold">
                                    <i class="fas fa-play mr-2"></i> <a
                                        href="{{ route('MovieInfo.show', $lastestMovie->id) }}">Xem ngay</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- 🔘 Thumbnails new -->
            {{-- <div class="absolute bottom-6 right-6 z-30 flex space-x-3">
                {{ $i = 0 }}
                @foreach ($twoLastestMovies as $lastestMovie)
                    <img onclick="goToSlide( {{ $i }} )" src="{{ asset($lastestMovie->thumbnail) }}"
                        class="thumb w-20 h-14 object-cover rounded cursor-pointer border-2 border-transparent hover:border-white transition" />
                    {{ $i++ }}
                @endforeach
            </div> --}}

            <!-- 🔘 Thumbnails old -->
            <div class="absolute bottom-6 right-6 z-30 flex space-x-3">
                <img onclick="goToSlide(0)" src="images/thumbnail2.jpg"
                    class="thumb w-20 h-14 object-cover rounded cursor-pointer border-2 border-transparent hover:border-white transition" />
                <img onclick="goToSlide(1)" src="images/thumbnail3.jpg"
                    class="thumb w-20 h-14 object-cover rounded cursor-pointer border-2 border-transparent hover:border-white transition" />
                <?php $i = 2; ?>
                @foreach ($twoLastestMovies as $lastestMovie)
                    <img onclick="goToSlide( {{ $i }} )" src="{{ asset($lastestMovie->thumbnail) }}"
                        class="thumb w-20 h-14 object-cover rounded cursor-pointer border-2 border-transparent hover:border-white transition" />
                    <?php $i++; ?>
                @endforeach
            </div>

        </section>

        {{-- categories --}}
        <section class="py-6 px-6 max-w-7xl mx-auto">
            <h3 class="text-xl font-semibold mb-4">Bạn đang quan tâm gì?</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach ($hotCategories as $hotCategory)
                    <div
                        class="rounded-xl p-4 bg-gradient-to-br {{ $hotCategory->classColor }} shadow hover:scale-105 transition">
                        <h4 class="font-bold text-white mb-1"> {{ $hotCategory->name }} </h4>
                        <a href="{{ route('MoviesByCategory.index', $hotCategory->id) }}"
                            class="text-white text-sm opacity-80 hover:underline">
                            Xem chủ đề <i class="fas fa-chevron-right text-xs ml-1"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- movies by country --}}
        <section class="w-full px-4 py-8 text-white">
            <div class="max-w-screen-xl mx-auto">
                <div class="rounded-2xl bg-[#1b1b1b] p-6 ring-2 ring-blue-500/40">
                    <div class="space-y-10" id="carouselContainer">

                        <!-- === PHIM HÀN QUỐC MỚI === -->
                        <div class="relative group-carousel">
                            <div class="flex items-center justify-between mb-4">
                                <h2
                                    class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-yellow-400 to-blue-500 bg-clip-text text-transparent">
                                    Phim Hàn Quốc mới
                                </h2>
                                <a href="{{ route('MoviesByCondition.index', 'UK') }} "
                                    class="text-sm text-white/70 hover:text-white transition-all">Xem toàn bộ
                                    <i class='fas fa-chevron-right text-xs'></i></a>
                            </div>
                            <div class="overflow-hidden">
                                <div class="carousel-track flex transition-transform duration-500 ease-in-out">

                                    @for ($i = 0; $i < count($koreaMovies); $i++)
                                        <div class="min-w-[33.3333%] px-2 box-border">
                                            <div class="bg-[#1d1d1d] rounded-xl overflow-hidden shadow-lg">
                                                <img src="{{ asset($koreaMovies[$i]->thumbnail) }}"
                                                    alt="{{ $koreaMovies[$i]->title }}"
                                                    class="w-full h-[170px] object-cover" />
                                                <div class="p-2">
                                                    <h3 class="text-lg font-semibold">{{ $koreaMovies[$i]->title }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                            <button
                                class="prev-btn absolute left-0 top-[40%] bg-white text-black hover:bg-white/90 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition hidden">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                class="next-btn absolute right-0 top-[40%] bg-white text-black hover:bg-white/90 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                        <!-- === PHIM TRUNG QUỐC MỚI === -->
                        <div class="relative group-carousel">
                            <div class="flex items-center justify-between mb-4">
                                <h2
                                    class="text-2xl font-bold bg-gradient-to-r from-yellow-400 to-red-500 bg-clip-text text-transparent">
                                    Phim Trung Quốc mới
                                </h2>
                                <a href="{{ route('MoviesByCondition.index', 'USA') }}"
                                    class="text-sm text-white/70 hover:text-white transition-all">Xem toàn
                                    bộ <i class='fas fa-chevron-right text-xs'></i></a>
                            </div>
                            <div class="overflow-hidden">
                                <div class="carousel-track flex transition-transform duration-500 ease-in-out">

                                    @foreach ($chinaMovies as $chinaMovie)
                                        <div class="min-w-[33.3333%] px-2 box-border">
                                            <div class="bg-[#1d1d1d] rounded-xl overflow-hidden shadow-lg">
                                                <img src="{{ asset($chinaMovie->thumbnail) }}"
                                                    alt="{{ $chinaMovie->title }}"
                                                    class="w-full h-[170px] object-cover" />
                                                <div class="p-2">
                                                    <h3 class="text-lg font-semibold">{{ $chinaMovie->title }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button
                                class="prev-btn absolute left-0 top-[40%] bg-white text-black hover:bg-white/90 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition hidden">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                class="next-btn absolute right-0 top-[40%] bg-white text-black hover:bg-white/90 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                        <!-- === PHIM ANIME MỚI === -->
                        <div class="relative group-carousel">
                            <div class="flex items-center justify-between mb-4">
                                <h2
                                    class="text-2xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">
                                    Phim Anime mới
                                </h2>
                                <a href="{{ route('MoviesByCondition.index', 'Canada') }}"
                                    class="text-sm text-white/70 hover:text-white transition-all">Xem toàn
                                    bộ <i class='fas fa-chevron-right text-xs'></i></a>
                            </div>
                            <div class="overflow-hidden">
                                <div class="carousel-track flex transition-transform duration-500 ease-in-out">

                                    @for ($i = 0; $i < count($animeMovies); $i++)
                                        <div class="min-w-[33.3333%] px-2 box-border">
                                            <div class="bg-[#1d1d1d] rounded-xl overflow-hidden shadow-lg">
                                                <img src="{{ asset($animeMovies[$i]->thumbnail) }}"
                                                    alt="{{ $animeMovies[$i]->title }}"
                                                    class="w-full h-[170px] object-cover" />
                                                <div class="p-2">
                                                    <h3 class="text-lg font-semibold"> {{ $animeMovies[$i]->title }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <button
                                class="prev-btn absolute left-0 top-[40%] bg-white text-black hover:bg-white/90 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition hidden">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                class="next-btn absolute right-0 top-[40%] bg-white text-black hover:bg-white/90 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- 🔥 Hot Movies -->
        <section class="w-full px-4 py-10 text-white">
            <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Sôi nổi nhất -->
                <div class="bg-[#1b1b1b] rounded-2xl p-4 border border-white/10">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-clapperboard text-yellow-400"></i>
                        Sôi nổi nhất
                    </h2>
                    <ul class="space-y-3">

                        @for ($i = 0; $i < count($recentHotMovie5); $i++)
                            <a href="{{ route('MovieInfo.show', $recentHotMovie5[$i]->id) }}">
                                <li class="pb-3 flex items-center gap-3 text-sm">
                                    <span class="text-gray-400">{{ $i + 1 }}.</span>
                                    <img src="{{ asset($recentHotMovie5[$i]->thumbnail) }}" class="w-7 h-10 rounded" />
                                    <span>{{ $recentHotMovie5[$i]->title }}</span>
                                </li>
                            </a>
                        @endfor
                    </ul>
                    <a href="{{ route('MoviesByCondition.index', 'ViewInWeek') }}"
                        class="inline-flex items-center gap-1 text-xs text-white/60 hover:text-white transition">
                        Xem thêm
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Yêu thích nhất -->
                <div class="bg-[#1b1b1b] rounded-2xl p-4 border border-white/10">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-hand-holding-heart text-yellow-300"></i>
                        Yêu thích nhất
                    </h2>
                    <ul class="space-y-3">
                        @for ($i = 0; $i < count($recentFavoriteMovie5); $i++)
                            <a href="{{ route('MovieInfo.show', $recentFavoriteMovie5[$i]->id) }}">
                                <li class="pb-3 flex items-center gap-3 text-sm">
                                    <span class="text-gray-400">{{ $i + 1 }}.</span>
                                    <img src="{{ asset($recentFavoriteMovie5[$i]->thumbnail) }}"
                                        class="w-7 h-10 rounded" />
                                    <span>{{ $recentFavoriteMovie5[$i]->title }}</span>
                                </li>
                            </a>
                        @endfor
                    </ul>

                    <a href="{{ route('MoviesByCondition.index', 'FavoriteInWeek') }}"
                        class="inline-flex items-center gap-1 text-xs text-white/60 hover:text-white transition">
                        Xem thêm
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Thể loại hot -->
                <div class="bg-[#1b1b1b] rounded-2xl p-4 border border-white/10">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-square-plus text-yellow-300"></i>
                        Thể loại hot
                    </h2>
                    <ul class="space-y-3">

                        @for ($i = 0; $i < count($top5HotCategories); $i++)
                            <li class="flex items-center gap-3 text-sm">
                                <a href="{{ route('MoviesByCategory.index', $top5HotCategories[$i]->id) }}">
                                    <span class="text-gray-400">{{ $j = $i + 1 }}.</span>
                                    <span
                                        class="px-2 py-0.5 rounded-full {{ $top5HotCategories[$i]->classColor }} text-xs">
                                        {{ $top5HotCategories[$i]->name }}
                                    </span>
                                </a>
                            </li>
                        @endfor
                    </ul>
                    <a href="javascript:void(0)" onclick="openStatsModal()"
                        class="inline-flex items-center gap-1 text-xs text-white/60 hover:text-white transition">
                        Xem thêm
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

            </div>
        </section>

        {{-- các item thể loại --}}
        <div id="statsModal" class="hidden fixed inset-0 bg-black/70 z-50">
            <div class="bg-[#1b1b1b] rounded-2xl p-6 max-w-lg mx-auto mt-20 relative">
                <!-- Nút đóng modal -->
                <button onclick="closeStatsModal()" class="absolute top-3 right-3 text-white/60 hover:text-white">
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <!-- Tiêu đề modal -->
                <h2 class="text-lg font-semibold mb-4">Thể loại hot</h2>

                <ul id="modalContent" class="space-y-3">

                    {{-- item thể loại hot --}}
                    <?php $j = 0; ?>
                    @foreach ($top9HotCategories as $top9HotCategory)
                        <?php $j++; ?>

                        <li class="flex items-center gap-3 text-sm">
                            <a href="{{ route('MoviesByCategory.index', $top9HotCategory->id) }}">
                                <span class="pr-3 text-gray-400">{{ $j }} </span>
                                <span
                                    class=" px-2 py-0.5 rounded-full {{ $top9HotCategory->classColor }} text-xs">{{ $top9HotCategory->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

        {{-- developing --}}
        {{-- <div id="statsModal"
            class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center transition-opacity duration-300 opacity-0 pointer-events-none">
            <!-- Modal box -->
            <div
                class="bg-[#1b1b1b] text-white rounded-xl p-6 w-full max-w-md shadow-lg scale-95 transition-transform duration-300">
                <button onclick="closeStatsModal()" class="absolute top-3 right-4 text-white text-xl hover:text-red-400">
                    &times;
                </button>
                <h2 class="text-xl font-bold mb-4">Top 10 Sôi Nổi Nhất</h2>
                <ul id="modalContent" class="space-y-3 text-sm">
                    <!-- JS sẽ đổ nội dung vào đây -->
                </ul>
            </div>
        </div> --}}

        {{-- phim điện ảnh mới cóng --}}
        <section class="w-full px-4 py-8 text-white">
            <div class="max-w-screen-xl mx-auto">
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Phim Điện Ảnh Mới Coóng</h2>
                        <button
                            class="group rounded-full border border-yellow-400 text-yellow-400 px-3 py-1 text-sm hover:bg-yellow-400 hover:text-black transition-all flex items-center gap-1">
                            <a href="{{ route('MoviesByCondition.index', 'New') }}"><span class="hidden sm:inline">Xem
                                    thêm</span></a>
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>

                    <!-- Carousel wrapper -->
                    <div class="overflow-hidden">
                        <div id="carouselTrack" class="flex transition-transform duration-500 ease-in-out">

                            <!-- Phim 1 -->
                            @foreach ($moviesByNew as $movieByNew)
                                <div class="min-w-[12.5%] px-1 box-border">
                                    <div class="bg-[#1d1d1d] rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset($movieByNew->thumbnail) }}"
                                            class="w-full h-[220px] object-cover rounded-t-xl" />
                                        <div class="p-2 text-sm">
                                            <span
                                                class="inline-block bg-blue-500 text-white text-xs px-2 py-0.5 rounded mb-1">L.Tiếng</span>
                                            <h3 class="mt-1 font-semibold leading-tight">
                                                <a href="{{ route('MovieInfo.show', $movieByNew->id) }}">
                                                    {{ $movieByNew->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Buttons -->
                    <button id="prevBtn" onclick="prevSlide()"
                        class="absolute left-0 top-[40%] bg-white text-black rounded-full w-10 h-10 flex items-center justify-center shadow-lg hidden">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <button id="nextBtn" onclick="nextSlide()"
                        class="absolute right-0 top-[40%] bg-white text-black rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        {{-- top 10 --}}
        <section class="w-full px-4 py-8 bg-[#111] text-white">
            <div class="max-w-screen-xl mx-auto">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold">Top 10</h2>
                    <div class="flex gap-2 text-sm"></div>
                </div>

                <div class="relative">
                    <div class="overflow-hidden">
                        <div id="top10Track" class="flex transition-transform duration-500 ease-in-out">

                            <!-- ==== ITEM 1 ==== -->
                            @foreach ($moviesByTop10 as $movieByTop10)
                                <div class="min-w-[20%] px-2 box-border">
                                    <div class="relative group">
                                        <span
                                            class="absolute top-2 left-2 z-10 text-[3.5rem] font-bold text-yellow-400 drop-shadow-[0_0_6px_rgba(0,0,0,0.7)] font-[anton] leading-none">1</span>
                                        <img src="{{ asset($movieByTop10->thumbnail) }}"
                                            class="w-full h-[380px] object-cover rounded-2xl rotate-[1deg] z-0 relative transition-all duration-300 ease-in-out group-hover:scale-90 group-hover:filter group-hover:sepia group-hover:hue-rotate-10 group-hover:brightness-110 group-hover:ring-4 group-hover:ring-yellow-400/60" />
                                    </div>
                                    <div class="mt-2">
                                        <h3 class="text-base font-semibold">
                                            <a href="{{ route('MovieInfo.show', $movieByTop10->id) }}">
                                                {{ $movieByTop10->title }} </a>
                                        </h3>
                                        <p class="text-sm text-white/60 italic"> <a
                                                href="{{ route('MovieInfo.show', $movieByTop10->id) }}">
                                                {{ $movieByTop10->title }} </a></p>
                                        <div class="text-xs mt-1 text-white/80">Phần 1 • Tập 12</div>
                                        <div class="mt-1 flex gap-2 text-xs">
                                            <span class="bg-gray-700 px-2 py-0.5 rounded">PĐ. 12</span>
                                            <span class="bg-green-600 px-2 py-0.5 rounded">TM. 12</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==== HẾT ITEM ==== -->
                            @endforeach

                        </div>
                    </div>

                    <button onclick="prevTop10()" id="prevTop10"
                        class="absolute left-0 top-[40%] bg-white text-black rounded-full w-10 h-10 flex items-center justify-center shadow-lg hidden">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <button onclick="nextTop10()" id="nextTop10"
                        class="absolute right-0 top-[40%] bg-white text-black rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        {{-- banner & phim mới & phim xem nhiều --}}
        <section class="w-full bg-[#111] text-white px-4 py-8 mb-20">
            <div class="max-w-screen-xl mx-auto">

                <div id="heroContainer" class="relative overflow-hidden rounded-2xl min-h-[400px] bg-black mb-8">

                    <!-- Slide 1 -->
                    <div class="hero-slide absolute inset-0 opacity-100 transition-opacity duration-700 ease-in-out">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="w-full md:w-[45%] p-6 md:p-10 flex flex-col justify-center z-10">
                                <h2 class="text-3xl md:text-4xl font-bold mb-3">Sông Dài Sáng Tỏ</h2>
                                <p class="text-white/80 text-sm max-w-xl mb-5">Mickey, một nữ cảnh sát tuần tra ở
                                    Philadelphia...</p>
                                <button
                                    class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-5 py-2 rounded-full text-sm flex items-center gap-2 w-fit">
                                    <i class="fa fa-play"></i> Xem ngay
                                </button>
                            </div>
                            <div class="w-full md:w-[55%] relative rounded-r-2xl overflow-hidden">
                                <img src="images/thumbnail2.jpg" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-r from-black via-black/60 to-transparent">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="w-full md:w-[45%] p-6 md:p-10 flex flex-col justify-center z-10">
                                <h2 class="text-3xl md:text-4xl font-bold mb-3">Bóng Tối Tái Sinh</h2>
                                <p class="text-white/80 text-sm max-w-xl mb-5">Một thám tử tỉnh dậy trong thế giới bị thao
                                    túng...</p>
                                <button
                                    class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-5 py-2 rounded-full text-sm flex items-center gap-2 w-fit">
                                    <i class="fa fa-play"></i> Xem ngay
                                </button>
                            </div>
                            <div class="w-full md:w-[55%] relative rounded-r-2xl overflow-hidden">
                                <img src="images/thumbnail3.jpg" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-r from-black via-black/60 to-transparent">
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($twoLastestMovies as $lastestMovie)
                        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out">
                            <div class="flex flex-col md:flex-row h-full">
                                <div class="w-full md:w-[45%] p-6 md:p-10 flex flex-col justify-center z-10">
                                    <h2 class="text-3xl md:text-4xl font-bold mb-3"> {{ $lastestMovie->title }} </h2>
                                    <p class="text-white/80 text-sm max-w-xl mb-5"> {{ $lastestMovie->description }} ...
                                    </p>
                                    <button
                                        class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-5 py-2 rounded-full text-sm flex items-center gap-2 w-fit">
                                        <i class="fa fa-play"></i> <a
                                            href="{{ route('MovieInfo.show', $lastestMovie->id) }}">Xem ngay</a>
                                    </button>
                                </div>
                                <div class="w-full md:w-[55%] relative rounded-r-2xl overflow-hidden">
                                    <img src=" {{ asset($lastestMovie->thumbnail) }} "
                                        class="w-full h-full object-cover" />
                                    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/60 to-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Wrapper chứa toàn bộ các sub-carousel -->
                <div id="subCarousels" class="space-y-14">

                    <!-- === SUB CAROUSEL: PHIM MỚi === -->
                    <div data-carousel class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold">Phim Mới</h3>
                            <div class="flex gap-2">
                                <button data-prev
                                    class="text-white bg-white/10 w-8 h-8 rounded-full flex items-center justify-center hover:bg-white/20">
                                    <i class="fa fa-chevron-left text-sm"></i>
                                </button>
                                <button data-next
                                    class="text-white bg-white/10 w-8 h-8 rounded-full flex items-center justify-center hover:bg-white/20">
                                    <i class="fa fa-chevron-right text-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div data-track class="flex transition-transform duration-500 ease-in-out"
                                style="width: max-content;">

                                <!-- ==== ITEM PHIM ==== -->
                                @foreach ($moviesByNew as $movieByNew)
                                    <div class="w-40 flex-shrink-0 mr-4 last:mr-0">
                                        <a href="{{ route('MovieInfo.show', $movieByTop10->id) }}">
                                            <div
                                                class="group rounded overflow-hidden shadow-md hover:scale-105 transition-transform duration-300">
                                                <img src=" {{ asset($movieByNew->thumbnail) }}" alt="Phim A"
                                                    class="w-full h-[240px] object-cover rounded" />
                                                <div
                                                    class="text-sm mt-1 text-white/80 text-center group-hover:text-yellow-400 transition-colors duration-200">
                                                    {{ $movieByNew->title }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                <!-- ==== HẾt ITEM ==== -->

                            </div>
                        </div>
                    </div>

                    <!-- === SUB CAROUSEL: XEM NHIỀU NHẤT === -->
                    <div data-carousel class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold">Xem nhiều nhất</h3>
                            <div class="flex gap-2">
                                <button data-prev
                                    class="text-white bg-white/10 w-8 h-8 rounded-full flex items-center justify-center hover:bg-white/20">
                                    <i class="fa fa-chevron-left text-sm"></i>
                                </button>
                                <button data-next
                                    class="text-white bg-white/10 w-8 h-8 rounded-full flex items-center justify-center hover:bg-white/20">
                                    <i class="fa fa-chevron-right text-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div data-track class="flex transition-transform duration-500 ease-in-out"
                                style="width: max-content;">

                                <!-- ==== ITEM PHIM ==== -->
                                @foreach ($moviesByTop10 as $movieByTop10)
                                    <div class="w-40 flex-shrink-0 mr-4 last:mr-0">
                                        <a href="{{ route('MovieInfo.show', $movieByTop10->id) }}">
                                            <div
                                                class="group rounded overflow-hidden shadow-md hover:scale-105 transition-transform duration-300">
                                                <img src="{{ asset($movieByTop10->thumbnail) }}" alt="Phim A"
                                                    class="w-full h-[240px] object-cover rounded" />
                                                <div
                                                    class="text-sm mt-1 text-white/80 text-center group-hover:text-yellow-400 transition-colors duration-200">
                                                    {{ $movieByTop10->title }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                <!-- ==== HẾt ITEM ==== -->

                            </div>
                        </div>
                    </div>
                </div>



        </section>
    </div>
@endsection

@push('js')
    <!-- ✅ Script for scroll behavior -->
    <Script type="module" src="js/slider.js"></Script>
    <Script src="js/data.js" defer></Script>
    <Script src="js/datafilm.js" defer></Script>
    <Script src="js/datatop.js" defer></Script>
    <Script src="js/Herodata.js" defer></Script>
    <script>
        function openStatsModal() {
            const modal = document.getElementById("statsModal");
            modal.classList.remove("hidden"); // Xóa class hidden để hiển thị modal
            modal.classList.remove("opacity-0", "pointer-events-none");
            modal.classList.add("opacity-100");

            const box = modal.querySelector("div");
            if (box) {
                box.classList.remove("scale-95");
                box.classList.add("scale-100");
            }
        }

        function closeStatsModal() {
            const modal = document.getElementById("statsModal");
            modal.classList.add("opacity-0", "pointer-events-none");
            modal.classList.remove("opacity-100");

            const box = modal.querySelector("div");
            if (box) {
                box.classList.add("scale-95");
                box.classList.remove("scale-100");
            }

            // Ẩn modal sau khi hiệu ứng kết thúc
            setTimeout(() => {
                modal.classList.add("hidden");
            }, 300); // Thời gian chờ bằng với duration của transition
        }
    </script>
@endpush
