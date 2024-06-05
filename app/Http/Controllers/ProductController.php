<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('main', [
            'title' => 'Home',
            'data' => [
                'products' => $products
            ]
        ]);
    }

    public function show(Product $product)
    {
        return view('product.show', [
            'title' => str($product->name)->title(),
            'data' => [
                'product' => $product
            ]
        ]);
    }

    public function create()
    {
        return view('product.create', [
            'title' => 'Create Product'
        ]);
    }
}
