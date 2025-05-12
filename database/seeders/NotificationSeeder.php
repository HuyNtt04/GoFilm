<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::create([
            'content' => 'Chúc mừng bạn đã trở thành người dùng VIP!',
            'id_send_user' => 1, // Người gửi (người tạo thông báo)
            'id_receive_user' => 1, // Người nhận
            'status' => 1, // Đã đọc
            'isDeleted' => false, // Chưa bị xóa
        ]);

        // Notification::create([
        //     'content' => 'Bạn đã nhận được thông báo về thanh toán thành công.',
        //     'id_send_user' => 2,
        //     'id_receive_user' => 2,
        //     'status' => 1,
        //     'isDeleted' => false,
        // ]);
    }
}