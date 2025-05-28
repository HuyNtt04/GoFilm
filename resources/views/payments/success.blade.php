@extends('../layouts.user')
@section('container')
<div class="container">
    <h1>Thanh toán thành công</h1>
    <p>Chúc mừng bạn đã đăng ký gói VIP thành công. Bạn giờ đã là người dùng Premium!</p>
    <a href="{{ route('home.index') }}" class="btn btn-primary">Quay lại trang chủ</a>
</div>
@endsection