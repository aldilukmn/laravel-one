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
    <form action="{{ route('products.index') }}" method="GET" accept-charset="UTF-8" role="search">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Product ..." name="search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
    </form>
    @if ($message = Session::get('success'))
        <script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
        <script>
            const message = "{{ $message }}";
            showToast('success', message);
        </script>
    @endif
    <table class="table table-hover">
        <thead>
            <th>No.</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Category</th>
            <th class="text-center">Opsi</th>
        </thead>
        @if (count($products) > 0)
            @foreach ($products as $product)
                <tbody>
                    <td>{{ $number++ }}</td>
                    <td>
                        <img src="{{ asset('images/' . $product->image) }}" alt="image-product" class="img-thumbnail"
                            style="width: 100px">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-warning btn-sm"
                                onclick="window.location='{{ route('products.show', $product->id) }}'">Edit</button>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">Delete</button>
                            </form>
                        </div>
                    </td>
                </tbody>
            @endforeach
        @else
            <tbody>
                <td class="border-0 fs-5 text-center text-secondary pt-5" colspan="6">Product not found.</td>
            </tbody>
        @endif

    </table>
    <nav aria-label="Page navigation">
        {{-- {{ $products->links() }} --}}
        {!! $products->appends(Request::except('page'))->render() !!}
    </nav>
@endsection
