# Shoe Store RESTful API

Đây là dự án Backend xây dựng hệ thống quản lý cửa hàng giày bằng Laravel 11( đang phát triển). Dự án này chứng minh năng lực xây dựng và bảo mật RESTful API.
## Các tính năng chính
* **Authentication:** Bảo mật API bằng Token-based Authentication (Laravel Sanctum).
* **CRUD Sản phẩm:** Trọn bộ API để Thêm (Create), Đọc (Read), Sửa (Update), Xóa (Delete) sản phẩm giày.
* **Upload Hình ảnh:** Xử lý upload và lưu trữ hình ảnh sản phẩm.
* **Validation:** Kiểm tra dữ liệu đầu vào kỹ càng cho mọi trường hợp.
## Hình ảnh minh họa & Chứng minh kết quả test API
Đã được kiểm thử trên Postman. Có thể xem dữ liệu tại thư mục `/screenshots`.

### Xóa mềm (Soft Delete)
Để đảm bảo an toàn dữ liệu, hệ thống không xóa vĩnh viễn sản phẩm mà sử dụng cơ chế **Soft Delete**.
* **Xóa tạm thời:** Sản phẩm được đưa vào thùng rác (`deleted_at`).
* **Thùng rác API:** `GET /api/admin/products/trash` - Cho phép Admin xem lại các món đồ đã xóa.
* **Khôi phục:** `POST /api/admin/products/{id}/restore` - Khôi phục sản phẩm về trạng thái hoạt động trong 1 giây.