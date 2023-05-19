@extends('layouts.app')

@section('main')
    <div class="d-flex align-items-center mb-3">
        <div>
            <h2>Products</h2>
        </div>
        <div class="ms-auto">
            <a href="/products/create">
                <button class="btn btn-sm btn-primary">Add Product</button>
            </a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <th>No.</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Category</th>
            <th class="text-center">Opsi</th>
        </thead>
        <tbody>
            <td>1</td>
            <td>Image 1</td>
            <td>Gorengan</td>
            <td>5000</td>
            <td>Makanan</td>
            <td class="text-center ">
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tbody>
    </table>
@endsection
