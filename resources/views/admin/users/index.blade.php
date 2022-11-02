<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')
@section('title')
Registered Users
@endsection
@section('content')
    <div class="card">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card-header bg-primary ">
            <h4> Registered Users</h4>
        </div>
        <hr>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Registered Users </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered  table-striped table-hover"  id="example5" class="display">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $users->links() }}
                                </div>
                                @forelse ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name.''.$item->lastname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <a href="{{ url('view-user/' . $item->id) }}" class="btn btn-success">View</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Registered Users</td>
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
            $('#example5').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endsection
