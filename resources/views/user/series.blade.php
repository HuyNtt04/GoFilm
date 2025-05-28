@section('title', 'Phim bộ')

@extends('../layouts.user')

@section('container')
<!-- Content -->
<main class="pt-28 max-w-7xl mx-auto px-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Phim bộ</h2>
        <button class="text-sm flex items-center gap-2 text-white hover:text-yellow-400">
            <i class="fas fa-filter"></i>
            Bộ lọc
        </button>
    </div>

    <div id="movieList" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">

        @if ($movies->isEmpty())
        <div class="text-white text-center py-10">
            <p class="text-lg font-semibold">Không có phim nào để hiển thị.</p>
        </div>
        @else
        @for ($i = 0; $i < count($movies); $i++) <div
            class="bg-white/5 rounded-md overflow-hidden shadow hover:scale-[1.02] transition duration-200">
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
    @endif


    </div>

    <div class="mt-5">
        {{
                $movies->links();
            }}
    </div>
</main>
@endsection

@push('js')
{{-- <script src="{{ asset('js/grid.js') }}"></script> --}}
@endpush