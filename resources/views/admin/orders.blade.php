@extends('admin.adminmaster')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class='d-flex align-item-center justify-content-between'>
                            <h5 class="card-title m-0">Orders</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="text-center">Id</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Contact</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Created At</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($orders as $order)
                                        <tr class="border-2 border-bottom border-primary border-0">
                                            <th scope="col" class="text-center">{{ $order->id }}</th>
                                            <th scope="col" class="text-center">
                                                {{ $order->firstname . ' ' . $order->lastname }}</th>
                                            <th scope="col" class="text-center">{{ $order->contact }}</th>
                                            <th scope="col" class="text-center">{{ $order->email }}</th>
                                            <th scope="col" class="text-center">{{ $order->total }}</th>
                                            <th scope="col" class="text-center">{{ $order->created_at }}</th>
                                            <th scope="col" class="text-center">
                                                <a href="{{ route('delete-order', $order->id) }}" class='btn btn-danger'>Delete</a>
                                            </th>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
