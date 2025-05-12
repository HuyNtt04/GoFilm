@extends('../layouts.user')
@section('title', 'Thanh toán thành công')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-danger">❌ Đăng ký thất bại!</h1>
    <p class="lead">Có lỗi xảy ra trong quá trình thanh toán. Vui lòng thử lại.</p>
    <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">Về trang chủ</a>
    <a href="{{ route('subscriptions.plans') }}" class="btn btn-secondary mt-3">Chọn gói khác</a>
    @endsection