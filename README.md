<h1>🎬 Laravel Movie Streaming Website</h1>

<p>Một website streaming phim trực tuyến được xây dựng bằng Laravel framework, cung cấp trải nghiệm xem phim mượt mà với giao diện thân thiện và các tính năng quản lý phong phú.</p>

<h2>✨ Tính năng chính</h2>

<ul>
<li>🎥 <strong>Streaming phim chất lượng cao</strong> - Hỗ trợ nhiều định dạng video</li>
<li>👤 <strong>Quản lý người dùng</strong> - Đăng ký, đăng nhập, profile cá nhân</li>
<li>🔍 <strong>Tìm kiếm & Lọc</strong> - Tìm phim theo thể loại, năm, đánh giá</li>
<li>⭐ <strong>Đánh giá & Bình luận</strong> - Người dùng có thể đánh giá và bình luận phim</li>
<li>📊 <strong>Admin Dashboard</strong> - Quản lý phim, người dùng, thống kê</li>
<li>🎯 <strong>Gợi ý phim</strong> - Đề xuất phim dựa trên sở thích người dùng</li>
<li>📱 <strong>Responsive Design</strong> - Tương thích mọi thiết bị</li>
</ul>

<h2>🛠️ Công nghệ sử dụng</h2>

<ul>
<li><strong>Backend</strong>: Laravel 10.x</li>
<li><strong>Database</strong>: MySQL</li>
<li><strong>Frontend</strong>: Blade Templates, Bootstrap, jQuery</li>
<li><strong>Video Player</strong>: Video.js</li>
<li><strong>Authentication</strong>: Laravel Sanctum</li>
<li><strong>File Storage</strong>: Laravel Storage</li>
</ul>

<h2>📋 Yêu cầu hệ thống</h2>

<ul>
<li>PHP >= 8.1</li>
<li>Composer</li>
<li>MySQL >= 5.7</li>
<li>Node.js & NPM</li>
<li>Web Server (Apache/Nginx)</li>
</ul>

<h2>🚀 Hướng dẫn cài đặt</h2>

<h3>1. Clone repository</h3>

<pre><code>git clone https://github.com/username/laravel-movie-streaming.git
cd laravel-movie-streaming
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

<pre><code>APP_NAME="Movie Streaming"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=movie_streaming
DB_USERNAME=your_username
DB_PASSWORD=your_password

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

<p>Tạo database MySQL với tên <code>movie_streaming</code> (hoặc tên bạn đã cấu hình trong .env):</p>

<pre><code>CREATE DATABASE movie_streaming;
</code></pre>

<h3>6. Chạy migration</h3>

<pre><code># Chạy các migration để tạo bảng
php artisan migrate
</code></pre>

<h3>7. Seed dữ liệu mẫu</h3>

<pre><code># Chạy seeder để tạo dữ liệu mẫu
php artisan db:seed
</code></pre>

<p>Hoặc chạy từng seeder cụ thể:</p>

<pre><code>php artisan db:seed --class=UserSeeder
php artisan db:seed --class=GenreSeeder
php artisan db:seed --class=MovieSeeder
php artisan db:seed --class=ReviewSeeder
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
<li><strong>Email</strong>: admin@moviestream.com</li>
<li><strong>Password</strong>: admin123</li>
</ul>

<h3>User</h3>
<ul>
<li><strong>Email</strong>: user@moviestream.com</li>
<li><strong>Password</strong>: user123</li>
</ul>

<h2>📁 Cấu trúc dự án</h2>

<pre><code>laravel-movie-streaming/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/
│   │   ├── Auth/
│   │   └── Frontend/
│   ├── Models/
│   ├── Policies/
│   └── Services/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   ├── auth/
│   │   └── frontend/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   ├── api.php
│   └── admin.php
└── storage/
    └── app/
        └── public/
            ├── videos/
            └── thumbnails/
</code></pre>

<h2>🎯 Các lệnh hữu ích</h2>

<pre><code># Xóa cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Chạy queue workers (nếu sử dụng)
php artisan queue:work

# Tạo controller mới
php artisan make:controller MovieController

# Tạo model mới
php artisan make:model Movie -m

# Tạo migration mới
php artisan make:migration create_movies_table

# Tạo seeder mới
php artisan make:seeder MovieSeeder
</code></pre>

<h2>🔧 Cấu hình bổ sung</h2>

<h3>Video Storage</h3>
<p>Để lưu trữ video, bạn có thể cấu hình:</p>

<ol>
<li><strong>Local Storage</strong>: Mặc định trong <code>storage/app/public/videos</code></li>
<li><strong>Cloud Storage</strong>: Cấu hình AWS S3, Google Cloud, etc.</li>
</ol>

<h3>Performance</h3>
<ul>
<li>Cấu hình Redis cho cache và session</li>
<li>Sử dụng CDN cho video streaming</li>
<li>Optimize database queries với eager loading</li>
</ul>

<h3>Security</h3>
<ul>
<li>Cấu hình HTTPS cho production</li>
<li>Sử dụng rate limiting</li>
<li>Validate và sanitize user input</li>
</ul>

<h2>🐛 Troubleshooting</h2>

<h3>Lỗi thường gặp:</h3>

<ol>
<li><strong>Permission denied</strong>:
<pre><code>sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
</code></pre>
</li>

<li><strong>Database connection failed</strong>:
<ul>
<li>Kiểm tra thông tin database trong <code>.env</code></li>
<li>Đảm bảo MySQL service đang chạy</li>
</ul>
</li>

<li><strong>Video không phát được</strong>:
<ul>
<li>Kiểm tra storage link: <code>php artisan storage:link</code></li>
<li>Đảm bảo file video có định dạng hỗ trợ</li>
</ul>
</li>
</ol>

<h2>🤝 Đóng góp</h2>

<ol>
<li>Fork dự án</li>
<li>Tạo feature branch (<code>git checkout -b feature/AmazingFeature</code>)</li>
<li>Commit changes (<code>git commit -m 'Add some AmazingFeature'</code>)</li>
<li>Push to branch (<code>git push origin feature/AmazingFeature</code>)</li>
<li>Tạo Pull Request</li>
</ol>

<h2>📄 License</h2>

<p>Dự án này được cấp phép theo <a href="LICENSE">MIT License</a>.</p>

<h2>📞 Liên hệ</h2>

<ul>
<li><strong>Author</strong>: Your Name</li>
<li><strong>Email</strong>: your.email@example.com</li>
<li><strong>Project Link</strong>: https://github.com/username/laravel-movie-streaming</li>
</ul>

<h2>🙏 Acknowledgments</h2>

<ul>
<li>Laravel Framework</li>
<li>Bootstrap</li>
<li>Video.js</li>
<li>Font Awesome</li>
<li>Tất cả contributors đã đóng góp cho dự án</li>
</ul>

<hr>

<p>⭐ Nếu dự án hữu ích, hãy cho chúng tôi một star!</p>
