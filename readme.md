# Học laravel căn bản ( Learn laravel basic) - Beta
- Version laravel: 6.x
- Project tìm hiểu về laravel ở mức căn bản.
- Các chức năng chính: Thêm, xóa, sửa, validate
- Tìm hiểu route, blade template

## Hướng dẫn cài đặt ( Install)
- Clone code: ``git clone https://github.com/NguyenHiep/learn-laravel.git``
- Run: ``composer install ``
- Config database: vào file .env cấu hình thông tin host, database
- Run: ``php artisan key:generate``  để tạo key
- ``php artisan migrate`` để tạo bảng
- ``php artisan db:seed`` để tạo data mẫu
- ``php artisan vendor:publish --tag=datatables``
- ``php artisan vendor:publish --tag=datatables-buttons``
### Create user and create database

## Set permission for project
- ``sudo chown -R www-data:www-data /var/www/learn-laravel``
- ``sudo find /var/www/learn-laravel -type f -exec chmod 644 {} \; ``
- ``sudo find /var/www/learn-laravel -type d -exec chmod 755 {} \;``
- ``sudo chgrp -R www-data storage bootstrap/cache``
- ``sudo chmod -R ug+rwx storage bootstrap/cache``

Truy cập admin: http://domainname/manage

User và password: <strong>admin@gmail.com/admin123<strong>

## Tác giả ( Author)
Nguyễn Minh Hiệp
Website: http://minhhiep.info/

## License
Open source


