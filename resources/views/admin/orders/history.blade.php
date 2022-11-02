<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')
@section('title')
    Orders history
@endsection
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order history
                            <a href="{{ 'orders' }}" class="btn btn-primary float-end "> New Orders</a>
                        </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered  table-striped table-hover" id="example5" class="display">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $orders->links() }}
                                </div>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/' . $item->id) }}"
                                                class=" btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example5').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endsection
