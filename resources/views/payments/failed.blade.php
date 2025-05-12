@extends('../layouts.user')
@section('container')
<div class="container">
    <h1>Thanh toán không thành công</h1>
    <p>Rất tiếc, thanh toán của bạn đã không thành công. Vui lòng thử lại.</p>
    <a href="{{ route('home.index') }}" class="btn btn-primary">Quay lại trang chủ</a>
</div>
@endsection