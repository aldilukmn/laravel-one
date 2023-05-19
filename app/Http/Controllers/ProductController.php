<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'title' => 'Products'
        ]);
    }

    public function create() {
        return view('products.create', [
            'title' => 'Add Product'
        ]);
    }

    public function product()
    {
        return view('product.product', [
            'title' => 'Product'
        ]);
    }

    public function about()
    {
        return view('product.about', [
            'title' => 'About',
        ]);
    }
}
