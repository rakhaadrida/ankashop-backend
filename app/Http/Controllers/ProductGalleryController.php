<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductGalleryRequest;

class ProductGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = ProductGallery::with(['product'])->get();

        $data = [
            'items' => $items
        ];

        return view('pages.product-gallery.index', $data);
    }

    public function create()
    {
        $items = Product::All();

        $data = [
            'items' => $items
        ];

        return view('pages.product-gallery.create', $data);
    }

    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/product', 'public');
        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-gallery.index');
    }
}
