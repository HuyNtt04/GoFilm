@extends('../layouts.user')
@section('title', 'Chi tiết phim')

@section('container')

<script>
function showTab(tab) {
    ["episodes", "cast", "recommend"].forEach(id => {
        document.getElementById(`${id}Tab`).classList.add("hidden");
        document.getElementById(`tab-${id}`).classList.remove("border-b-2", "border-yellow-400",
            "text-yellow-400");
        document.getElementById(`tab-${id}`).classList.add("text-gray-300");
    });
    document.getElementById(`${tab}Tab`).classList.remove("hidden");
    document.getElementById(`tab-${tab}`).classList.add("border-b-2", "border-yellow-400", "text-yellow-400");
}
document.addEventListener("DOMContentLoaded", function() {
    showTab("episodes");
});
</script>

<main class="pt-28 max-w-7xl mx-auto px-6">
    <!-- Thông tin phim + Player -->
    <div class="bg-white/5 rounded-xl p-6 md:flex gap-6 mb-10 shadow-inner">
        <!-- Poster -->
        <div class="md:w-1/4 flex-shrink-0">
            <h2></h2>
            <img src="{{ asset($movie->thumbnail) }}" alt="Poster" class="rounded-lg w-full" />
            <h2 class="text-xl font-bold mt-4">{{ $movie->title }}</h2>
            <p class="text-sm text-yellow-400">{{ $movie->title }}</p>
            <div class="mt-2 flex flex-wrap gap-2 text-xs text-gray-300">
                <span class="bg-yellow-400 text-black px-2 py-1 rounded">IMDb {{ $movie->views ?? '8.7' }}</span>
                <span class="border px-2 py-1 rounded">T18</span>
                <span class="border px-2 py-1 rounded">{{ $movie->release_year }}</span>
                @if ($movie->is_series)
                <span class="border px-2 py-1 rounded">Phần {{ $movie->season ?? '1' }}</span>
                <span class="border px-2 py-1 rounded">Tập {{ $movie->current_episode ?? '6' }}</span>
                @else
                <span class="border px-2 py-1 rounded">HD</span>
                @endif
            </div>
            <p class="text-sm text-gray-400 mt-3">
                {{ $movie->is_series ? "Đã chiếu: {$movie->current_episode} / {$movie->total_episode} tập" : 'Đang chiếu: 1 tập' }}
            </p>

            <!-- Mô tả phim -->
            <div class="mt-4 text-sm text-gray-300">
                <h3 class="font-semibold text-white mb-1">Giới thiệu:</h3>
                <p>{{ $movie->description }}</p>
            </div>
        </div>

        <!-- Player + Controls -->
        <div class="md:w-3/4 mt-6 md:mt-0">
            @if($movie->trailer_url)
            <iframe class="w-full aspect-video rounded-lg shadow" src="{{ $movie->trailer_url }}" title="Trailer"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <div class="flex gap-4 mt-4 flex-wrap">
                @if (isset($isBlocked) && $isBlocked)
                <div class="alert alert-warning">
                    <strong>Phim này chỉ dành cho tài khoản VIP.</strong>
                </div>
                @else
                <a class="px-5 py-2 bg-yellow-400 text-black rounded-full font-semibold hover:bg-yellow-300"
                    href="{{ route('MovieDetail.show', $movie->id) }}"><i class="fas fa-play mr-2"></i>Xem ngay</a>
                @endif


                @if(Auth()->check())
                @if($favoriteMovie == null)
                <form action="{{ route('FavoriteMovies.store') }}" method="post" class="contents">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $id_user }}">
                    <input type="hidden" name="id_movie" value="{{ $movieInfo->id }}">
                    <button type="submit" name="submit"
                        class="bg-white/10 text-white px-4 py-2 rounded-full hover:bg-red-600 flex items-center gap-2">
                        <i class="fas fa-heart"></i> Yêu thích
                    </button>
                </form>
                @else
                <form action="{{ Route('FavoriteMovies.destroy') }}" method="post" class="contents">
                    @csrf
                    <input type="hidden" name="id_movie" value="{{ $favoriteMovie->id_movie }}">
                    <input type="hidden" name="id" value="{{ $favoriteMovie->id }}">
                    <button type="submit" name="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 flex items-center gap-2">
                        <i class="fas fa-heart"></i> Yêu thích
                    </button>
                </form>
                @endif

                @endif

                <button class="bg-white/10 text-white px-4 py-2 rounded-full hover:bg-white/20"><i
                        class="fas fa-bookmark mr-2"></i>Thêm vào</button>
                <button class="bg-white/10 text-white px-4 py-2 rounded-full hover:bg-white/20"><i
                        class="fas fa-share-alt mr-2"></i>Chia sẻ</button>
            </div>
            @endif
        </div>
    </div>

    <!-- Tabs -->
    <div class="border-b border-white/10 mb-6">
        <div class="flex space-x-6 text-sm font-semibold">
            <button onclick="showTab('episodes')" id="tab-episodes"
                class="py-2 border-b-2 border-yellow-400 text-yellow-400">Tập phim</button>
            <button onclick="showTab('cast')" id="tab-cast" class="py-2 text-gray-300 hover:text-white">Diễn
                viên</button>
            <button onclick="showTab('recommend')" id="tab-recommend" class="py-2 text-gray-300 hover:text-white">Đề
                xuất</button>
        </div>
    </div>

    <div id="tabContent">
        <!-- Tab Tập phim -->
        <div id="episodesTab">
            @if (isset($isBlocked) && $isBlocked)
            <div class="alert alert-warning">
                <strong>Phim này chỉ dành cho tài khoản VIP.</strong>
            </div>
            @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @if ($episodes->isNotEmpty())
                @foreach ($episodes as $episode)
                <a href="{{ route('MovieDetail.show', ['id' => $movie->id, 'tap' => $episode->episode]) }}"
                    class="bg-white/10 hover:bg-yellow-400 hover:text-black text-white font-semibold py-2 rounded text-center">
                    Tập {{ $episode->episode }}
                </a>
                @endforeach
                @else
                <p class="text-gray-400">Chưa có tập phim nào.</p>
                @endif
            </div>
            @endif
        </div>

        <!-- Tab Diễn viên -->
        <div id="castTab" class="hidden">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @php $casts = explode(',', $movie->cast); @endphp
                @foreach ($casts as $actor)
                <div class="bg-white/5 p-4 rounded text-center">
                    <i class='fas fa-user-circle text-3xl mb-2'></i>
                    <div class='text-sm'>{{ trim($actor) }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tab Đề xuất -->
        <div id="recommendTab" class="hidden">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                @foreach ($recommendations as $recommend)
                <a href="{{ route('MovieDetail.show', $recommend->id) }}"
                    class="bg-white/5 p-2 rounded hover:bg-white/10 transition text-center text-sm">
                    <img src="{{ asset($recommend->thumbnail) }}" class="rounded mb-2 w-full aspect-[2/3] object-cover">
                    <div>{{ $recommend->title }}</div>
                </a>
                @endforeach
            </div>
        </div>
    </div>



    {{-- ------------ --}}
    <section class="mt-10 mb-20 px-4">
        <!-- Đường line mờ ngăn cách -->
        <div class="border-t border-gray-700 opacity-30 mb-8"></div>

        <!-- Container nhỏ gọn, căn trái -->
        <div class="max-w-xl text-white">

            <!-- Tiêu đề & Tabs -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2 text-xl font-semibold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 8h2a2 2 0 012 2v7a2 2 0 01-2 2h-2m-4 0H7a2 2 0 01-2-2v-7a2 2 0 012-2h6m0-4v4m0 0l-2-2m2 2l2-2" />
                    </svg>
                    Bình luận <span class="text-yellow-400">(5)</span>
                </div>
                <div class="space-x-2 text-sm">
                    <button class="px-3 py-1 rounded border text-white bg-white/10 border-white/20">Bình luận</button>
                    <button
                        class="px-3 py-1 rounded border text-white border-white/20 hover:bg-white/10 transition">Đánh
                        giá</button>
                </div>
            </div>

            <!-- Thông báo đăng nhập -->
            @if (!Auth::check())
            <p class="text-sm text-gray-400 mb-4">Vui lòng <a href="#" class="text-yellow-400 hover:underline">đăng
                    nhập</a> để tham gia bình luận.</p>
            @endif

            <!-- Form bình luận chính -->
            @if (Auth::check())
            <form action="{{ route('Comments.store') }}" method="post">
                @csrf
                <div class="bg-[#1c1c1c] rounded-xl p-4 mb-6">
                    <textarea required name="content"
                        class="w-full bg-transparent text-white resize-none placeholder-gray-500 border-none focus:ring-0"
                        placeholder="Viết bình luận" rows="4" maxlength="1000"></textarea>

                    <input type="hidden" name="id_movie" value="{{ $movieInfo->id }}">
                    <input type="hidden" name="id_user" value="{{ $id_user }}">

                    <div class="flex justify-between items-center mt-2">
                        <label class="flex items-center gap-1 text-sm text-gray-400 cursor-pointer">
                            <input type="checkbox" class="form-checkbox text-yellow-400" />
                            Tiết lộ?
                        </label>
                        <div class="text-sm text-gray-500">0 / 1000</div>

                        <button type="submit"
                            class="flex items-center gap-1 text-yellow-400 font-semibold hover:text-yellow-300 transition">
                            Gửi <span>&#x279E;</span>
                        </button>

                    </div>
                </div>
            </form>
            @else
            <!-- Bình luận -->
            <!-- Form bình luận -->
            <div class="bg-[#1c1c1c] rounded-xl p-4 mb-6">
                <textarea
                    class="w-full bg-transparent text-white resize-none placeholder-gray-500 border-none focus:ring-0"
                    placeholder="Viết bình luận" rows="4" maxlength="1000"></textarea>
                <div class="flex justify-between items-center mt-2">
                    <label class="flex items-center gap-1 text-sm text-gray-400 cursor-pointer">
                        <input type="checkbox" class="form-checkbox text-yellow-400" />
                        Tiết lộ?
                    </label>
                    <div class="text-sm text-gray-500">0 / 1000</div>
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-1 text-yellow-400 font-semibold hover:text-yellow-300 transition">
                        Gửi <span>&#x279E;</span>
                    </a>
                </div>
            </div>
            @endif

            <!-- Danh sách bình luận -->
            <div class="space-y-6">

                @foreach ($latestCommentsByMovie as $latestCommentByMovie)
                <!-- Bình luận 1 -->
                <div class="flex gap-4 items-start">
                    <img src='{{ asset("images/$latestCommentByMovie->image") }}' class=" w-10 h-10 rounded-full" />
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold">{{ $latestCommentByMovie->name }}</span>
                                <span class="text-yellow-400">∞</span>
                                <span class="text-xs text-gray-400">
                                    {{ $latestCommentByMovie->dateTimeAgo }}</span>
                            </div>
                            <span class="text-xs text-gray-500 bg-white/10 px-2 py-1 rounded">P.2 - Tập 1</span>
                        </div>
                        <p class="mt-1 text-gray-300">{{ $latestCommentByMovie->content }}</p>
                        <div class="flex items-center text-sm mt-2 text-gray-500 gap-4">
                            <button class="hover:underline reply-toggle-btn">👍</button>
                            <button class="hover:underline reply-toggle-btn">Trả lời</button>
                            <button class="hover:underline">... Thêm</button>
                        </div>

                        <!-- Form phản hồi nhỏ -->
                        <form action="{{ route('Replies.store') }}" method="post">
                            @csrf
                            <div class="reply-form hidden mt-3">
                                <input type="hidden" name="idMovie" value="{{ $movieInfo->id }}">
                                <input type="hidden" name="sender_id" value="{{ $id_user }}">
                                <input type="hidden" name="received_id" value="{{ $latestCommentByMovie->idUser }}">
                                <input type="hidden" name="comment_id" value="{{ $latestCommentByMovie->id }}">
                                <textarea name="content" rows="2" placeholder="Phản hồi..."
                                    class="w-full bg-[#2a2a2a] text-sm text-white p-2 rounded resize-none"></textarea>
                                <div class="flex justify-end mt-2">
                                    <button type="submit"
                                        class="px-3 py-1 text-sm bg-yellow-500 text-black rounded hover:bg-yellow-400">Gửi
                                        phản hồi</button>
                                </div>
                            </div>
                        </form>

                        <!-- Danh sách phản hồi con (thụt vào) -->
                        <div class="mt-4 ml-6 space-y-4">
                            <!-- Phản hồi 1 -->
                            @foreach ($latestCommentByMovie->replies as $reply)
                            <div class="flex gap-3 items-start">
                                <img src="{{ $reply -> image }}" class="w-9 h-9 rounded-full" />
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold">{{ $reply->name }}</span>
                                        <span class="text-xs text-gray-400">{{ $reply->diffTimeAgoFormatted }}</span>
                                    </div>
                                    <p class="text-gray-300 text-sm mt-1"> {{ $reply->content }} </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

</main>
@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.reply-toggle-btn').forEach(button => {
        button.addEventListener('click', () => {
            const replyForm = button.closest('.flex-1').querySelector('.reply-form');
            if (replyForm) {
                replyForm.classList.toggle('hidden');
            }
        });
    });
});
</script>
@endpush

<style>
.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
}

.alert a {
    color: #155724;
    text-decoration: underline;
}
</style>