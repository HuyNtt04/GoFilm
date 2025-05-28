<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class Vnpay
{
    public static function generatePaymentUrl($data)
    {
        $vnpayUrl = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'; // Địa chỉ thanh toán VNPAY (sandbox hoặc production)
        
        $vnpayData = array_merge($data, [
            'vnp_SecureHash' => self::generateSecureHash($data)
        ]);

        // Chuyển các tham số thành query string
        $query = http_build_query($vnpayData);

        return $vnpayUrl . '?' . $query;
    }

    public static function generateSecureHash($data)
    {
        // Tạo chuỗi Secure Hash bằng cách sử dụng Secret Key của bạn
        $secureHash = ''; 
        ksort($data);

        foreach ($data as $key => $value) {
            if ($value != "") {
                $secureHash .= $key . '=' . $value . '&';
            }
        }

        // Loại bỏ dấu "&" cuối
        $secureHash = rtrim($secureHash, '&');

        return hash_hmac('sha256', $secureHash, 'VNPAY_SECRET_KEY'); // Sử dụng Secret Key của bạn
    }
}