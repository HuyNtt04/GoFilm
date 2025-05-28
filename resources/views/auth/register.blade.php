@section('title', 'Đăng ký')

@extends('./layouts.user')

@section('container')
<style>
.container {
    background-image: url('{{ asset('images/background.jpg') }}');
    object-fit: cover;
    max-width: 100%;
    background-attachment: fixed;
    background-color: #1a1b2e;
    background-blend-mode: overlay;
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    background-color: rgba(26, 27, 46, 0.85);
    padding: 2rem;
    border-radius: 10px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.login-header {
    text-align: center;
    margin-bottom: 2rem;
}

.login-header h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 5px;
    background-color: rgba(42, 43, 62, 0.7);
    color: #fff;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-group input:focus {
    outline: none;
    border-color: #ffd700;
    background-color: rgba(42, 43, 62, 0.9);
}

.captcha-container {
    background-color: rgba(42, 43, 62, 0.7);
    padding: 1rem;
    border-radius: 5px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.login-btn {
    width: 100%;
    padding: 12px;
    background-color: #ffd700;
    color: #1a1b2e;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}

.login-btn:hover {
    background-color: #ffed4a;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.register-link {
    text-align: center;
    margin-top: 1rem;
}

.register-link a {
    color: #ffd700;
    text-decoration: none;
    transition: color 0.3s ease;
}

.register-link a:hover {
    color: #ffed4a;
}

.forgot-password {
    text-align: center;
    margin-top: 1rem;
}

.forgot-password a {
    color: #888;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.forgot-password a:hover {
    color: #fff;
}

.close-btn {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: none;
    border: none;
    color: #fff;
    font-size: 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.close-btn:hover {
    transform: scale(1.2);
    color: #ffd700;
}
</style>
<div class="container">
    <div class="login-container">
        <div class="login-header">
            <h1>Đăng ký</h1>
            <p>Đã có tài khoản? <a href="{{ route('login') }}" style="color: #ffd700;">Đăng nhập ngay</a></p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="Tên người dùng" value="{{ old('name') }}" required>
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
                @error('password')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                @error('password_confirmation')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="login-btn">Đăng ký</button>
        </form>
    </div>
</div>
@endsection