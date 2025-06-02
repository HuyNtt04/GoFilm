<h1>🎬 Laravel Movie Streaming Website</h1>

<p>Một website streaming phim trực tuyến được xây dựng bằng Laravel framework.</p>

<h2>Tính năng chính</h2>

<ul>
<li><strong>Quản lý người dùng</strong> - Đăng ký, đăng nhập, profile cá nhân</li>
<li><strong>Tìm kiếm & Lọc</strong> - Tìm phim theo thể loại, năm, đánh giá</li>
<li><strong>Đánh giá & Bình luận</strong> - Người dùng có thể đánh giá và bình luận phim</li>
<li><strong>Admin Dashboard</strong> - Quản lý phim, người dùng, thống kê</li>
<li><strong>Gợi ý phim</strong> - Đề xuất phim dựa theo thể loại</li>

</ul>

<h2>🚀 Hướng dẫn cài đặt</h2>

<h3>1. Clone repository</h3>

<pre><code>git clone https://github.com/username/laravel-movie-streaming.git
cd laravel-movie-streaming
</code></pre>

<h3>2. Cài đặt dependencies</h3>

<pre><code># Cài đặt PHP dependencies
composer install

Cài đặt Node.js dependencies,
npm install
</code></pre>

<h3>3. Cấu hình môi trường</h3>

<pre><code># Copy file cấu hình môi trường
cp .env.example .env

Generate application key,
php artisan key:generate
</code></pre>

<h3>4. Cấu hình file .env</h3>

<p>Mở file <code>.env</code> và cập nhật các thông tin sau:</p>

<pre><code>APP_NAME="Movie Streaming"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000/

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projectf
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

Mail configuration (optional),
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

File upload settings,
UPLOAD_MAX_SIZE=100000
VIDEO_STORAGE_PATH=public/videos
THUMBNAIL_STORAGE_PATH=public/thumbnails
</code></pre>

<h3>5. Tạo database</h3>

<p>Tạo database MySQL với tên bạn đã cấu hình trong .env</p>

<h3>6. Chạy migration</h3>

<pre><code># Chạy các migration để tạo bảng
php artisan migrate
</code></pre>

<h3>7. Import database kèm theo</h3>

<p>Sử dụng file databse Gofilm và import database lên MySQL.</p>

<h3>8. Tạo storage link</h3>

<pre><code># Tạo symbolic link cho storage
php artisan storage:link
</code></pre>

<h3>9. Build assets</h3>

<pre><code># Build CSS và JS
npm run build

Hoặc để development,
npm run dev
</code></pre>

<h3>10. Khởi chạy server</h3>

<pre><code># Khởi chạy development server
php artisan serve
</code></pre>

<p>Website sẽ chạy tại: <code>http://localhost:8000/</code></p>

<h2>👤 Tài khoản mặc định</h2>

<p>Sau khi chạy seeder, bạn có thể đăng nhập với các tài khoản sau:</p>

<h3>Admin</h3>
<ul>
<li><strong>Email</strong>: admin@gmail.com</li>
<li><strong>Password</strong>: 12345678</li>
</ul>

<h3>User</h3>
<ul>
<li><strong>Email</strong>: huy@gmail.com</li>
<li><strong>Password</strong>: 12345678</li>
</ul>

<p><em>P/S: các link phim được phát trên website hoàn toàn là phim được kéo về và nhúng bằng drive nên nếu muốn thử chức năng thêm sửa xoá và hiển thị phim thì bạn hãy kiếm bất kỳ link video nào có thể nhúng được nhé.</em></p>


<h2>🎯 Các lệnh hữu ích</h2>

<pre><code># Xóa cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

<h2>📄 License</h2>

<p>Dự án này là 1 dự án phi lợi nhuận tao ra với mục đích học tập, trang web vẫn chỉ là 1 trang cơ bản đầy đủ các chức năng để tạo website và vẫn được update thường xuyên</a>.</p>
