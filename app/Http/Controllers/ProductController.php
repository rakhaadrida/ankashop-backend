<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        $items = Product::All();
        $data = [
            'items' => $items
        ];

        return view('pages.product.index', $data);
    }

    public function create() {
        return view('pages.product.create');
    }

    public function store(ProductRequest $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Product::create($data);

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id) {
        $item = Product::findOrFail($id);
        $data = [
            'item' => $item
        ];

        return view('pages.product.edit', $data);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        ProductGallery::where('product_id', $id)->delete();

        return redirect()->route('product.index');
    }

    public function gallery(Request $request, $id) {
        $product = Product::findOrFail($id);
        $items = ProductGallery::with(['product'])->where('product_id', $id)->get();

        $data = [
            'product' => $product,
            'items' => $items
        ];

        return view('pages.product.gallery', $data);
    }
}
