<h1>🎬 Laravel Movie Streaming Website</h1>

<p>Một website streaming phim trực tuyến được xây dựng bằng Laravel framework, cung cấp trải nghiệm xem phim mượt mà với giao diện thân thiện và các tính năng quản lý phong phú.</p>

<h2>✨ Tính năng chính</h2>

<ul>
<li>🎥 <strong>Streaming phim chất lượng cao</strong></li>
<li>👤 <strong>Quản lý người dùng</strong> - Đăng ký, đăng nhập, profile cá nhân</li>
<li>🔍 <strong>Tìm kiếm & Lọc</strong> - Tìm phim theo thể loại, năm</li>
<li>⭐ <strong>Đánh giá & Bình luận</strong> - Người dùng có thể đánh giá và bình luận phim</li>
<li>📊 <strong>Admin Dashboard</strong> - Quản lý phim, người dùng</li>
<li>🎯 <strong>Gợi ý phim</strong> - Đề xuất phim dựa cùng thể loại</li>
</ul>

<h2>🛠️ Công nghệ sử dụng</h2>

<ul>
<li><strong>Backend</strong>: Laravel 10.x</li>
<li><strong>Database</strong>: MySQL</li>
<li><strong>Frontend</strong>: Blade Templates, Bootstrap, Tailwind</li>
<li><strong>Video Player</strong>: Video.js</li>
<li><strong>Authentication</strong>: Laravel Sanctum</li>
<li><strong>File Storage</strong>: Laravel Storage</li>
</ul>

<h2>📋 Yêu cầu hệ thống</h2>

<ul>
<li>PHP >= 8.1</li>
<li>Composer</li>
<li>MySQL</li>
</ul>

<h2>🚀 Hướng dẫn cài đặt</h2>

<h3>1. Clone repository</h3>

<pre><code>git clone https://github.com/HuyNtt04/GoFilm.git
cd Gofilm
</code></pre>

<h3>2. Cài đặt dependencies</h3>

<pre><code># Cài đặt PHP dependencies
composer install

# Cài đặt Node.js dependencies
npm install
</code></pre>

<h3>3. Cấu hình môi trường</h3>

<pre><code># Copy file cấu hình môi trường
cp .env.example .env

# Generate application key
php artisan key:generate
</code></pre>

<h3>4. Cấu hình file .env</h3>

<p>Mở file <code>.env</code> và cập nhật các thông tin sau:</p>

<pre><code>APP_NAME="localhost"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

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

# Mail configuration (optional)
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

# File upload settings
UPLOAD_MAX_SIZE=100000
VIDEO_STORAGE_PATH=public/videos
THUMBNAIL_STORAGE_PATH=public/thumbnails
</code></pre>

<h3>5. Tạo database</h3>

<p>Tạo database MySQL với tên <code>projectf</code> (hoặc tên bạn đã cấu hình trong .env):</p>

<pre><code>CREATE DATABASE projectf;
</code></pre>

<h3>6. Chạy migration</h3>

<pre><code># Chạy các migration để tạo bảng
php artisan migrate
</code></pre>

<h3>7. Seed dữ liệu mẫu</h3>

<pre><code># Chạy seeder để tạo dữ liệu mẫu
php artisan db:seed
</code></pre>


<h3>8. Tạo storage link</h3>

<pre><code># Tạo symbolic link cho storage
php artisan storage:link
</code></pre>

<h3>9. Build assets</h3>

<pre><code># Build CSS và JS
npm run build

# Hoặc để development
npm run dev
</code></pre>

<h3>10. Khởi chạy server</h3>

<pre><code># Khởi chạy development server
php artisan serve
</code></pre>

<p>Website sẽ chạy tại: <code>http://localhost:8000</code></p>

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

<h2>📄 NOTES</h2>

<p>Dự án này được tạo ra trong quá trình học tập nên chỉ có những chức năng cơ bản đủ để tạo website.</p>

<h2>📞 Liên hệ</h2>

<ul>
<li><strong>Author</strong>: Nguyễn Huy</li>
<li><strong>Email</strong>: thanhhuy26032004@gmail.com</li>
</ul>

<h2>🙏 Acknowledgments</h2>

<ul>
<li>Laravel Framework</li>
<li>Bootstrap</li>
<li>Video.js</li>
<li>Tailwind</li>    
<li>Font Awesome</li>
<li>Tất cả contributors đã đóng góp cho dự án</li>
</ul>

<hr>

<p>⭐ Nếu dự án hữu ích, hãy cho chúng tôi một star!</p>
