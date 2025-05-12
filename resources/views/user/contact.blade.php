@section('title', 'Liên hệ')

@extends('../layouts.user')

@section('container')
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phim lẻ - ROPhim</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#0e0f1a] text-white font-sans">

    <!-- Navbar (reused from chủ đề layout) -->
    <section class="py-12 px-4 md:px-8 lg:px-16 bg-[#0e0f1a] text-white mt-20">
        <div class="max-w-6xl mx-auto">
            <!-- Tiêu đề -->
            <h1 class="text-3xl md:text-4xl font-bold text-center mb-8">
                Liên Hệ
            </h1>
            <P class="text-xl gray-400 mb-10">
                Chào mừng bạn đến với trang Liên Hệ của GO Film! Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn để mang
                lại trải nghiệm tốt nhất khi sử dụng dịch vụ.
                Nếu có bất kỳ câu hỏi, góp ý, hoặc yêu cầu hỗ trợ nào, hãy liên hệ với chúng tôi qua các thông tin dưới
                đây.
            </P>

            <!-- Nội dung chính -->
            <div class="space-y-8">
                <!-- Câu hỏi 1 -->
                <div>
                    <h2 class="text-xl font-semibold text-yellow-400 mb-2">
                        1. Thông Tin Liên Hệ Chính
                    </h2>
                    <p class="text-xl-gray-400">
                        <strong>Email hỗ trợ khách hàng:</strong> lienhe@Goflim.com<br>

                        <strong>Vấn đề tài khoản: </strong> Quên mật khẩu, không thể truy cập, và các vấn đề liên quan
                        đến tài khoản.<br>
                        <strong>Hỗ trợ kỹ thuật:</strong> Sự cố khi xem phim, chất lượng video hoặc các lỗi khác khi sử
                        dụng trang web.<br>
                        <strong>Đóng góp ý kiến: </strong> Chúng tôi trân trọng mọi ý kiến đóng góp từ bạn để nâng cao
                        chất lượng dịch vụ.<br>
                        <br>
                        Email liên hệ về Chính Sách Riêng Tư: <strong>lienhe@GOflim.com</strong>
                        <br>
                        Mọi thắc mắc liên quan đến bảo mật thông tin và chính sách riêng tư của GO Film.
                    </p>
                </div>

                <!-- Câu hỏi 2 -->
                <div>
                    <h2 class="text-xl font-semibold text-yellow-400 mb-2">
                        2. Liên hệ qua mạng xã hội
                    </h2>
                    <p class="text-gray-400">
                        Ngoài email, bạn cũng có thể liên hệ và cập nhật thông tin mới nhất từ GO Flim qua các kênh mạng
                        xã hội của chúng tôi:<br>
                        <br>
                    <div class="flex gap-3 text-white/70">
                        <a href="#"><i class="fab fa-telegram-plane text-3xl"></i></a>
                        <a href="#"><i class="fab fa-facebook-f text-3xl"></i></a>
                        <a href="#"><i class="fab fa-tiktok text-3xl"></i></a>
                        <a href="#"><i class="fab fa-youtube text-3xl"></i></a>
                        <a href="#"><i class="fab fa-discord text-3xl"></i></a>
                        <a href="#"><i class="fab fa-instagram text-3xl"></i></a>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
    header.style.backgroundColor = 'rgba(14, 15, 26, 0)';
    header.style.transition = 'background-color 0.3s ease';

    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        const maxScroll = 100;
        const opacity = Math.min(scrollPosition / maxScroll, 1);

        header.style.backgroundColor = `rgba(14, 15, 26, ${opacity})`;

        if (scrollPosition > 20) {
            header.classList.add('shadow');
        } else {
            header.classList.remove('shadow');
        }
    });
    </script>

</body>

</html>
@endsection