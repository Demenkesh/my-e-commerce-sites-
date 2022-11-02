<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')
@section('title')
    Currency Page
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
                        <h4 class="text-white">Currency page </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered  table-striped table-hover" id="example2" class="display">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Exchange_rate(USD 746=?)</th>
                                    <th scope="col">Symbol</th>
                                    <th scope="col">code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $currency->links() }}
                                </div>
                                @forelse ($currency as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->exchange_rate }}</td>
                                        <td>{{ $item->symbol }}</td>

                                        <td>{{ $item->code }}</td>
                                        <td>
                                            <a href="{{ url('edit-currency/' . $item->id) }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('delete-currency/' . $item->id) }}" class="btn btn-danger"
                                                onclick="myFunction()">Delete</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No currency Avaliable</td>
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
        function myFunction() {
            alert("Do you want to delete this post!");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endsection
