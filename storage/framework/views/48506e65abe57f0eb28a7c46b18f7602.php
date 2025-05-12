<h2>Chào <?php echo e($subscription->user->name); ?>,</h2>

<p>Bạn đã thanh toán thành công cho gói <strong><?php echo e($subscription->plan->name); ?></strong>.</p>
<p>Giá: <strong><?php echo e(number_format($subscription->plan->price, 0, ',', '.')); ?> VND</strong></p>
<p>Ngày thanh toán: <?php echo e(now()->format('d/m/Y H:i')); ?></p>

<p>Cảm ơn bạn đã sử dụng dịch vụ!</p><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/user/emails/payment_success.blade.php ENDPATH**/ ?>