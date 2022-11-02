<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Add Slider Page
@endsection
@section('content')
    <div class="card ">
        <div class="card-header bg-primary">
            <h4>Add Slider Page</h4>
        </div>
        <div class="card-body ">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('insert-slider') }}" method="POST" enctype="multipart/form-data">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Add your Slider</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">

                        @csrf
                        <div class="col-md-12 mb-3 ">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" rows="3" value="{{ old('name') }}"
                                class="form-control" id="" placeholder="your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="" placeholder="your description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <div class="">
                                <label>
                                    Status
                                </label>
                                <input type="checkbox" name="status" id="">

                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Image</label>
                            <input type="file" name="image" multiple class="form-control" />{{ old('image') }}

                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>



            </form>

        </div>
    </div>
@endsection
