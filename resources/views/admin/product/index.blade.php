<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')
@section('title')
    Product Page
@endsection
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('message'))
                        <font color="green">{{ Session::get('message') }}</font>
                    @endif
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Product Page </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered  table-striped table-hover " id="example" class="display">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    {{-- <th scope="col">Big Discount</th>
                                    <th scope="col">New arrival</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-1">
                                    {{ $products->links() }}
                                </div>
                                @forelse ($products as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>

                                        <td>{{ $item->selling_price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        {{-- <td>{{ $item->bigdiscount }}</td>
                                        <td>{{ $item->newarrival }}</td> --}}
                                        <td>
                                            <a href="{{ url('edit-product/' . $item->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('delete-product/' . $item->id) }}" class="btn btn-danger"
                                                onclick="myFunction()">Delete</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Products Avaliable</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endsection
