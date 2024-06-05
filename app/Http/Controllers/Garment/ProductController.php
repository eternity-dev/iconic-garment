<?php

namespace App\Http\Controllers\Garment;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('garment_id', auth()->guard('garment')->user()->id)->get();

        return view('product.index', [
            'title' => 'List Product',
            'data' => [
                'products' => $products
            ]
        ]);
    }
}
