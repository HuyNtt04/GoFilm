@section('title', 'Phim lẻ')

@extends('../layouts.user')

@section('container')

    <!-- Content -->
    <main class="pt-28 max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Phim lẻ</h2>
            <a onclick="toggleFilter()" class="text-sm flex items-center gap-2 text-white hover:text-yellow-400">
                <i class="fas fa-filter"></i>
                Bộ lọc
            </a>

            <form action="#" method="get" id="filterPopup"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300">
                <div
                    class="bg-[#1c1c1c] text-white p-6 rounded-xl w-full max-w-2xl transform scale-95 transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Bộ lọc phim</h2>
                        <a onclick="toggleFilter()" class="text-gray-400 hover:text-red-400 text-xl">&times;</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Quốc gia -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Quốc gia</label>
                            <div class="flex flex-wrap gap-2 max-h-40 overflow-y-auto">

                                @foreach($countries as $country)
                                <div class="flex items-center space-x-2 w-1/2">
                                    <input type="checkbox" name="countries[]" value="{{ $country -> country }}" id="country_{{ $country -> country  }}"
                                        class="accent-yellow-400">
                                    <label for="country_{{ $country -> country  }}">{{ $country -> country   }}</label>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Thể loại -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Thể loại</label>
                            <div class="flex flex-wrap gap-2 max-h-40 overflow-y-auto">

                                @foreach($categories as $category)
                                <div class="flex items-center space-x-2 w-1/2">
                                    <input type="checkbox" name="categories[]" value="{{ $category -> id }}" id="category_{{ $category -> id  }}"
                                        class="accent-yellow-400">
                                    <label for="category_{{ $category -> id  }}">{{ $category -> name }}</label>
                                </div>
                               @endforeach

                            </div>
                        </div>

                        <!-- Năm sản xuất -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Năm sản xuất</label>
                            <div class="flex flex-wrap gap-2 max-h-40 overflow-y-auto">
                                @foreach($years as $year)
                                <div class="flex items-center space-x-2 w-1/2">
                                    <input type="checkbox" name="years[]" value="{{ $year -> release_year }} " id="year_{{ $year -> release_year }}"
                                        class="accent-yellow-400">
                                    <label for="year_{{ $year -> release_year }}">{{ $year -> release_year }}</label>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>

                        <!-- Sắp xếp -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Sắp xếp</label>
                            <select name="sort" class="w-full px-3 py-2 rounded bg-white/10 text-white">
                                <option value="desc" class="text-black">Mới nhất</option>
                                <option value="asc" class="text-black">Cũ nhất</option>
                                <option value="az" class="text-black">Tên A-Z</option>
                                <option value="za" class="text-black">Tên Z-A</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a onclick="toggleFilter()" class="px-4 py-2 text-gray-300 hover:text-white cursor-pointer">Huỷ</a>
                        <button type="submit" name="submit" value="submit"
                            class="px-4 py-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-300">Áp
                            dụng</button>
                    </div>
                </div>
            </form>

        </div>

        <div id="movieList" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">

            @for ($i = 0; $i < count($movies); $i++)
                <div class="bg-white/5 rounded-md overflow-hidden shadow hover:scale-[1.02] transition duration-200">
                    <a href="{{ route('MovieInfo.show', $movies[$i]->id) }}">
                        <img src="{{ asset($movies[$i]->thumbnail) }}" alt="{{ $movies[$i]->title }}"
                            class="w-full h-60 object-cover">
                        <div class="p-3">
                            <p class="text-sm font-semibold text-white">{{ $movies[$i]->title }}</p>
                            <span class="inline-block mt-2 px-2 py-0.5 text-xs bg-white/10 rounded text-white">P.Đ.B</span>
                        </div>
                    </a>
                </div>
            @endfor

        </div>

        <div class="mt-5">
            {{
                $movies->links();
            }}
        </div>
    </main>
@endsection

@push('js')
    <script>
        // Khởi tạo sự kiện khi DOM load xong
        document.addEventListener("DOMContentLoaded", () => {
            // Thêm sự kiện click cho nút mở popup
            document.getElementById("openFilterBtn").addEventListener("click", toggleFilter);
        });

        // Hàm điều khiển hiển thị popup
        function toggleFilter() {
            const popup = document.getElementById("filterPopup");
            const inner = popup.querySelector("div");
            const isHidden = popup.classList.contains("pointer-events-none");

            popup.classList.toggle("opacity-0", !isHidden);
            popup.classList.toggle("pointer-events-none", !isHidden);
            inner.classList.toggle("scale-95", !isHidden);
            inner.classList.toggle("scale-100", isHidden);
        }
    </script>
@endpush
