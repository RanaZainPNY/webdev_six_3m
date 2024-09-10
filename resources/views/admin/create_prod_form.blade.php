@extends('admin.adminmaster')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-2">Create Product</h5>
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('admin-products-store') }}" method='POST'>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="name">
                            </div>

                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <select name="brand_id">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input name="name" type="text" class="form-control" id="name"> --}}
                            </div>



                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input name="sku" type="text" class="form-control" id="sku">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input name="price" type="text" class="form-control" id="price">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class='form-control' name="description" id="description" cols="30" rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Image</label>
                                <input name='image' class="form-control" type="file" id="formFile">
                            </div>

                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
