<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h2 class="mb-0 h4">Thêm mới sản phẩm</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Brand</label>
                        <select name="brand_id" class="form-select" required>
                            <option value="">-- Chọn Brand --</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá (VNĐ)</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tồn kho</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Hình ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Trở lại</a>
                        <button type="submit" class="btn btn-success px-5">Lưu sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>