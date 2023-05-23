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
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name"
                        value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" placeholder="Enter Price" name="price" id="price" value="{{ old('price') }}">
                </div>
                <div class="mb-3">
                    <img src="" alt="img-product" class="mb-3 img-thumbnail" style="width: 200px;"
                        id="file-preview">
                    <input type="file" class="form-control" name="image" accept="image/*" onchange="showFile(event)" id="image">
                </div>
                <select class="form-select mb-3" name="category" id="category">
                    <option selected disabled>Open this select menu</option>
                    @foreach ($category as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100" id="save" disabled>Save</button>
                </div>
            </form>
            <div>
                <button class="btn btn-danger w-100"
                    onclick="window.location='{{ route('products.index') }}'">Cancel</button>
            </div>
        </div>
    </div>
@endsection
