@section('title', 'Xem Phim')

@extends('../layouts.user')

@section('container')
    <main class="pt-24 max-w-7xl mx-auto px-4">
        <!-- Video chính trung tâm -->
        @if ($videoUrl)
            <div class="w-full aspect-video bg-black mb-8 relative">
                <iframe src="{{ $videoUrl }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                    allow="autoplay; encrypted-media" allowfullscreen frameborder="0">
                </iframe>
            </div>
        @else
            <div class="text-center text-red-400 my-10">Không tìm thấy link phim.</div>
        @endif

        <!-- Dưới player -->
        <div class="flex flex-col md:flex-column gap-6">
            <!-- Bên trái: Poster + thông tin -->
            <div class="w-full md:w-3/4">
                <div class="flex gap-4 mb-6">
                    <img src="{{ asset($movieDetail->thumbnail ?? $movie->poster) }}" class="w-24 h-auto rounded-md" />
                    <div>
                        <h2 class="text-2xl font-bold">{{ $movieDetail->title ?? $movieDetail->title }}</h2>
                        <p class="text-sm text-yellow-400">{{ $movieDetail->origin_title ?? $movieDetail->origin_title }}
                        </p>
                        <div class="flex flex-wrap gap-2 mt-2 text-xs">
                            <span class="bg-yellow-400 text-black px-2 py-1 rounded">IMDb
                                {{ $movie->rating ?? 'N/A' }}</span>
                            <span class="border px-2 py-1 rounded">{{ $movieDetail->age_restricted ?? 'T18' }}</span>
                            <span class="border px-2 py-1 rounded">{{ $movieDetail->year ?? '2025' }}</span>
                            @if ($movieDetail->is_series ?? true)
                                <span class="border px-2 py-1 rounded">Phần {{ $movieDetail->season ?? '1' }}</span>
                                @if ($currentEpisode)
                                    <span class="border px-2 py-1 rounded">Tập {{ $currentEpisode->episode_number }}</span>
                                @endif
                            @else
                                <span class="border px-2 py-1 rounded">HD</span>
                            @endif
                        </div>
                        <div class="flex flex-wrap gap-2 mt-3 text-xs">
                            @foreach ($movieDetail->categories ?? [] as $category)
                                <span
                                    class="bg-white/10 hover:bg-white/20 px-2 py-1 rounded cursor-pointer">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <p class="text-sm text-gray-300 leading-relaxed mb-6">
                    {{ $movieDetail->description ?? $movie->description }}
                </p>

                <!-- Danh sách tập -->
                @if ($movieDetail->is_series ?? true)
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-3">
                        @foreach ($movieDetail->episodes ?? [] as $episode)
                            <a href="{{ route('movie.watch', ['id' => $movie->id, 'episode' => $episode->id]) }}"
                                class="px-4 py-2 rounded 
                        {{ $episode->id == ($currentEpisode->id ?? null)
                            ? 'bg-yellow-400 text-black'
                            : 'bg-white/10 hover:bg-yellow-400 hover:text-black' }}">
                                Tập {{ $episode->episode_number }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="grid grid-cols-1">
                        <span class="bg-yellow-400 text-black px-4 py-2 rounded">HD</span>
                    </div>
                @endif
            </div>

            <!-- Bên phải: Diễn viên và gợi ý -->
            <div class="w-full md:w-1/4 flex flex-col gap-6" style="width: 100%;">
                <!-- Diễn viên -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Diễn viên</h3>
                    <div class="grid grid-cols-3 gap-3 text-center text-xs">
                        @php
                            $casts = explode(',', $movie->cast ?? '');
                        @endphp
                        @foreach ($casts as $actor)
                            <div class="bg-white/5 p-4 rounded text-center">
                                <i class='fas fa-user-circle text-3xl mb-2'></i>
                                <div class='text-sm'>{{ trim($actor) }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Gợi ý phim -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Đề xuất cho bạn</h3>
                    <div class="space-y-3 text-sm"
                        style=" display: flex;
                        flex-direction: row;
                        gap: 5%;
                        width: 100%;
                        justify-content: center;">
                        @foreach ($recommendations as $recommend)
                            <a href="{{ route('MovieInfo.show', $recommend->id) }}">
                                <img src="{{ asset($recommend->thumbnail) }}" alt="{{ $recommend->title }}"
                                    class="w-full h-60 object-cover">
                                <div class="p-3">
                                    <p class="text-sm font-semibold text-white">{{ $recommend->title }}</p>
                                    <span
                                        class="inline-block mt-2 px-2 py-0.5 text-xs bg-white/10 rounded text-white">P.Đ.B</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
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
                    <p class="text-sm text-gray-400 mb-4">Vui lòng <a href="#"
                            class="text-yellow-400 hover:underline">đăng nhập</a> để tham gia bình luận.</p>
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
                        <textarea class="w-full bg-transparent text-white resize-none placeholder-gray-500 border-none focus:ring-0"
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
                            <img src="https://i.pravatar.cc/40?img=32" class="w-10 h-10 rounded-full" />
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
                                        <input type="hidden" name="received_id"
                                            value="{{ $latestCommentByMovie->idUser }}">
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
                                            <img src="{{ $reply->image }}" class="w-9 h-9 rounded-full" />
                                            <div class="flex-1">
                                                <div class="flex justify-between items-center">
                                                    <span class="font-semibold">{{ $reply->name }}</span>
                                                    <span
                                                        class="text-xs text-gray-400">{{ $reply->diffTimeAgoFormatted }}</span>
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
    <!-- JavaScript -->
    <script>
        document.querySelectorAll('.reply-toggle-btn').forEach(button => {
            button.addEventListener('click', () => {
                const replyForm = button.closest('.flex-1').querySelector('.reply-form');
                replyForm.classList.toggle('hidden');
            });
        });
    </script>
@endpush
