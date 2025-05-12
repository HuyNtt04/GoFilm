@section('title', 'Các thể loại phim')

@extends('../layouts.user')

@section('container')
<!-- Content padding-top for fixed header -->
<div class="pt-28 max-w-7xl mx-auto px-6">
    <h2 class="text-2xl font-bold mb-6">Các chủ đề</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <!-- Repeatable box item -->
        @foreach($categories as $category)
        <div
            class="rounded-xl p-4 bg-gradient-to-br {{ $category -> classColor }} shadow hover:scale-[1.03] transition h-32">
            <h4 class="font-bold text-white text-lg mb-2">{{ $category -> name }}</h4>
            <a href="{{ Route('MoviesByCategory.index', $category -> id) }}"
                class="text-white text-sm opacity-90 hover:underline">Xem toàn bộ <i
                    class="fas fa-chevron-right text-xs ml-1"></i></a>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('js')
@endpush