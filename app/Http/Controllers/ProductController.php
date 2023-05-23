<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderby('created_at', 'desc')->paginate(5)->fragment('std');
        $keyword = $request->get('search');
        // $products = Product::paginate(5)->fragment('std');
        $number = 1 + (($products->currentPage() - 1) * $products->perPage());

        if (!empty($keyword)) {
            $products = Product::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->paginate(5)->onEachSide(2)->fragment('std');
        } else {
            $products = $products;
        }

        return view('products.index', [
            'title' => 'Products',
            'products' => $products,
            'number' => $number,
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $category = json_decode('{"Food":"Food", "Drink":"Drink", "Snack":"Snack"}', true);
        return view('products.create', [
            'title' => 'Add Product',
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028',
        ]);

        $product = new Product();

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $file_name;
        $product->category = $request->category;

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function about()
    {
        return view('products.about', [
            'title' => 'About',
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $category = json_decode('{"Food":"Food", "Drink":"Drink", "Snack":"Snack"}', true);

        return view('products.show', [
            'title' => 'Edit Product',
            'product' => $product,
            'category' => $category,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            
        ]);

        $file_name = $request->hidden_image;

        if ($request->image != '') {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        $product = Product::find($request->hidden_id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $file_name;
        $product->category = $request->category;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image_path = public_path() . '/images/';
        $image = $image_path . $product->image;
        if (file_exists($image)) {
            unlink($image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deteled.');
    }
}
