@extends('layouts.app')

@section('main')
    <div class="container w-75">
        <div class="card p-5 shadow-sm">
            <div class="mb-3">
                <h2 class="text-center">Add Product</h2>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name="name">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Price" name="price">
                </div>
                <div class="mb-3">
                    <img src="" alt="img-product" class="mb-3 img-thumbnail" style="width: 200px;" id="file-preview">
                    <input type="file" class="form-control" name="image" accept="image/*" onchange="showFile(event)">
                </div>
                <select class="form-select mb-3" name="category">
                    <option selected>Open this select menu</option>
                    @foreach (json_decode('{"Food":"Food", "Drink":"Drink", "Snack":"Snack"}', true) as $item)
                        
                    @endforeach
                    <option value="Food">Food</option>
                    <option value="Drink">Drink</option>
                    <option value="Snack">Snack</option>
                </select>
                <div class="mb-3">
                    <button class="btn btn-primary w-100">Save</button>
                </div>
                <div>
                    <a href="/products">
                        <button class="btn btn-danger w-100">Cancel</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
