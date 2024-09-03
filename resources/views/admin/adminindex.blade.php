@extends('admin.adminmaster')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class='d-flex align-item-center justify-content-between'>
                            <h5 class="card-title m-0">Products</h5>
                            <a href="{{ route('admin-product-create') }}" class="btn btn-outline-primary mb-3">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="text-center">Id</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">SKU</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Created At</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <div class='w-100 d-flex justify-content-center align-items-center'>
                                                    <img class='w-25'
                                                        src="{{ asset('uploads/products/' . $product->image) }}"
                                                        alt="prod-img">

                                                </div>
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin-products-edit', $product->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('admin-products-delete', $product->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Welcome to our
                                                website</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/index.html</a>
                                        </td>
                                        <td class="text-center fw-medium">18,456</td>
                                        <td class="text-center fw-medium">$2.40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Modern Admin
                                                Dashboard Template</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/dashboard</a>
                                        </td>
                                        <td class="text-center fw-medium">17,452</td>
                                        <td class="text-center fw-medium">$0.97</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Explore our
                                                product catalog</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/product-checkout</a>
                                        </td>
                                        <td class="text-center fw-medium">12,180</td>
                                        <td class="text-center fw-medium">$7,50</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Comprehensive
                                                User Guide</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/docs</a>
                                        </td>
                                        <td class="text-center fw-medium">800</td>
                                        <td class="text-center fw-medium">$5,50</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium border-0">
                                            <span class="table-link1 text-truncate d-block">Check out our
                                                services</span>
                                        </th>
                                        <td class="border-0">
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/services</a>
                                        </td>
                                        <td class="text-center fw-medium border-0">1300</td>
                                        <td class="text-center fw-medium border-0">$2,15</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
