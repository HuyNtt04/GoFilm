<h2>Chào {{ $subscription->user->name }},</h2>

<p>Bạn đã thanh toán thành công cho gói <strong>{{ $subscription->plan->name }}</strong>.</p>
<p>Giá: <strong>{{ number_format($subscription->plan->price, 0, ',', '.') }} VND</strong></p>
<p>Ngày thanh toán: {{ now()->format('d/m/Y H:i') }}</p>

<p>Cảm ơn bạn đã sử dụng dịch vụ!</p>