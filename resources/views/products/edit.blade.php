<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h2 class="mb-0 h4">Chỉnh sửa sản phẩm: {{ $product->name }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Brand</label>
                    <select name="brand_id" class="form-select" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Giá (VNĐ)</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tồn kho</label>
                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Hình ảnh sản phẩm</label>
                    <div class="mb-2">
                        @if($product->image)
                            <p class="text-muted small">Ảnh hiện tại:</p>
                            <img src="{{ asset('storage/' . $product->image) }}" width="150" class="img-thumbnail">
                        @endif
                    </div>
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Để trống nếu không muốn thay đổi ảnh.</small>
                </div>

                <div class="d-flex justify-content-between border-top pt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-warning px-5 fw-bold">Cập nhật sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>