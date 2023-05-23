@extends('layouts.app')

@section('main')
    <div class="container w-75">
        <div class="card p-5 shadow-sm">
            <div class="mb-3">
                <h2 class="text-center">Edit Product</h2>
            </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
                            <script>
                                const message = "{{ $error }}";
                                showToast('error', message);
                            </script>
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name="name" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Price" name="price" value="{{ $product->price }}">
                </div>
                <div class="mb-3">
                    <img src="{{ asset('images/' . $product->image) }}" alt="img-product" class="mb-3 img-thumbnail" style="width: 200px;"
                        id="file-preview">
                    <input type="file" class="form-control" name="image" accept="image/*" onchange="showFile(event)">
                    <input type="hidden" name="hidden_image" value="{{ $product->image }}">
                </div>
                <select class="form-select mb-3" name="category">
                    <option selected disabled>Open this select menu</option>
                    @foreach ($category as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($product->category) && ($product->category == $optionKey) ? 'selected' : '' ) }}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <input type="hidden" name="hidden_id" value="{{ $product->id }}">
                    <button class="btn btn-primary w-100">Update</button>
                </div>
            </form>
            <div>
                <a href="{{ route('products.index') }}">
                    <button class="btn btn-danger w-100">Cancel</button>
                </a>
            </div>
        </div>
    </div>
@endsection
