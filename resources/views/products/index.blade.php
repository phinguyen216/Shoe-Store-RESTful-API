<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thông báo:</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function() {
                let alertElement = document.getElementById('success-alert');
                if (alertElement) {
                    let bsAlert = new bootstrap.Alert(alertElement);
                    bsAlert.close();
                }
            }, 4000);
        </script>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h2>Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                + Add Product
            </a>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td class="text-center">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="80" class="img-thumbnail">
                        @else
                        <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td><span class="badge bg-info text-dark">{{ $product->brand->name ?? 'N/A' }}</span></td>
                    <td class="text-danger fw-bold">{{ number_format($product->price) }} VNĐ</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>