@section('title', 'Chi tiết danh mục')

@extends('layouts.user')

@section('container')
<br><br><br>
<!-- Category Details Page -->
<section class="py-6 px-6 max-w-7xl mx-auto">
    <h3 class="text-xl font-semibold mb-4">Phim theo chủ đề: {{ $category->name }}</h3>

    @if (!empty($movies) && count($movies) > 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach($movies as $movie)
        <div class="rounded-xl p-4 bg-gradient-to-br from-pink-600 to-rose-400 shadow hover:scale-105 transition">
            <img src="{{ asset($movie->thumbnail) }}" alt="{{ $movie->title }}"
                class="w-full h-40 object-cover rounded-md mb-3">
            <h4 class="font-bold text-white mb-1">{{ $movie->title }}</h4>
            <a href="{{ route('MovieInfo.show', $movie->id) }}" class="text-white text-sm opacity-80 hover:underline">
                Xem chi tiết <i class="fas fa-chevron-right text-xs ml-1"></i>
            </a>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-600">Không có phim nào thuộc danh mục này.</p>
    @endif
</section>

@endsection