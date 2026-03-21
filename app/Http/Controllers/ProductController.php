<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // View sản phẩm
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            if ($product->image) {
                $product->image = url('storage/' . $product->image);
            }
            return $product;
        });
        return response()->json([
            'status' => true,
            'data' => $products
        ], 200);
    }
    //Xem chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $product
        ], 200);
    }
    //Tạo sản phẩm
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product = Product::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Thêm sản phẩm thành công!',
            'data' => $product
        ], 201); // 201: Created
    }
    //Sửa sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required', // sometimes: chỉ validate nếu có truyền lên
            'brand_id' => 'sometimes|required|exists:brands,id',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!',
            'data' => $product
        ], 200);
    }
    // xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm để xóa'], 404);
        }

        // Xóa file ảnh vật lý trên storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa sản phẩm thành công!'
        ], 200);
    }
    public function trash()
    {
        $trashedProduct = Product::onlyTrashed()->get();
        return response()->json([
            'status' => true,
            'data' => $trashedProduct
        ]);
    }
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->restore();
            return response()->json([
                'status' => true,
                'message' => 'Khôi phục sản phẩm thành công!',
                'data' => $product
            ], 200);
        }

        return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
    }
    public function forceDelete($id)
{
    // Tìm sản phẩm trong cả thùng rác
    $product = Product::withTrashed()->find($id);

    if (!$product) {
        return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
    }

    if ($product->image && file_exists(public_path('storage/' . $product->image))) {
        unlink(public_path('storage/' . $product->image));
    }
    
    $product->forceDelete();

    return response()->json([
        'status' => true,
        'message' => 'Đã xóa vĩnh viễn sản phẩm và tệp tin liên quan!'
    ], 200);
}
}
