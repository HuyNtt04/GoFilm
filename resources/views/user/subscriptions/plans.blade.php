@extends('../layouts.user')
@section('title', 'Đăng ký hội viên GO Film')
@section('container')
<div style="margin-top: 75.98px;">
    <div class="container mx-auto px-4 py-8 text-white bg-gray-950 min-h-screen">

        <div class="mb-8">
            <a href="{{ route('home.index') }}"
                class="inline-flex items-center text-gray-400 hover:text-white transition">
                <i class="fas fa-arrow-left mr-2"></i> Quay lại trang chủ
            </a>
        </div>

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">
                Đăng ký hội viên <span class="text-orange-500">GO Film</span>
            </h1>
            <p class="text-gray-400">Chọn gói phù hợp với nhu cầu của bạn</p>
        </div>

        {{-- KIỂM TRA NGƯỜI DÙNG ĐÃ PREMIUM CHƯA --}}
        @if (isset($isBlocked) && $isBlocked == 0)
        <div class="text-center bg-green-800 p-6 rounded-lg text-white font-semibold text-xl max-w-xl mx-auto">
            <a href="/profile">🎉 Bạn đã đăng ký hội viên rồi! Tới trang profile để xem chi tiết</a>
        </div>
        @else
        {{-- CHƯA PREMIUM: HIỂN THỊ CÁC GÓI --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-12">
            @foreach ($plans as $plan)
            <div id="plan-{{ $plan->id }}"
                class="bg-gray-800 rounded-lg overflow-hidden border-2 transform transition-all hover:scale-105 border-gray-700">
                <div class="p-6 text-center">
                    <span class="inline-block px-3 py-1 bg-blue-600 rounded-full text-sm mb-2">{{ $plan->name }}</span>

                    <h2 class="text-2xl font-bold">{{ $plan->name }}</h2>
                    <div class="mt-4 text-3xl font-bold">
                        {{ number_format($plan->price, 0, ',', '.') }}₫
                        <span class="text-base text-gray-400 font-normal">/ {{ $plan->duration }} tháng</span>
                    </div>

                    <div class="mt-6 text-left text-sm leading-relaxed text-gray-300 space-y-2">
                        {!! nl2br(e($plan->detail)) !!}
                    </div>

                    <form action="{{ route('subscriptions.purchase', $plan->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-6 w-full py-3 rounded-lg bg-orange-500 hover:bg-orange-600 transition font-semibold">
                            Chọn gói này
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center text-gray-400 text-sm max-w-md mx-auto mb-10">
            <p class="mb-2">Bạn có thể hủy đăng ký bất cứ lúc nào.</p>
            <p>
                Bằng cách đăng ký, bạn đồng ý với
                <a href="#" class="text-blue-400 hover:underline">điều khoản dịch vụ</a> và
                <a href="#" class="text-blue-400 hover:underline">chính sách bảo mật</a> của chúng tôi.
            </p>
        </div>
        @endif

    </div>
</div>
@endsection