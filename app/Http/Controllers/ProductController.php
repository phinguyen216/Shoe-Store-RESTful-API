<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('brand')->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $brands = Brand::all();
        return view('products.create', compact('brands'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
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

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        return view('products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
