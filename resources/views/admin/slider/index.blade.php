<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')
@section('title')
    Slider Page
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
                        <h4 class="text-white">Slider page </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered  table-striped table-hover" id="example2" class="display">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $sliders->links() }}
                                </div>
                                @forelse ($sliders as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <img src="{{ asset("$item->image") }}" style="width:70px; height:70px"
                                                alt="Slider">
                                        </td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('edit-slider/' . $item->id) }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('delete-slider/' . $item->id) }}" class="btn btn-danger"
                                                onclick="myFunction()">Delete</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Sliders Avaliable</td>
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
