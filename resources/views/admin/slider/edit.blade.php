<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Edit Slider Page
@endsection
@section('content')
    <div class="card ">
        @if (session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif
        <div class="card-header bg-primary">
            <h4>Edit Slider page</h4>
        </div>

        <div class="card-body my-custom-scrollbar">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('update-slider/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Edit </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="col-md-12 mb-3 ">
                            <label class="form-label">Title</label>
                            <input type="text" value="{{ $slider->title }}" name="title" class="form-control"
                                id="" placeholder="your name">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="your description">{{ $slider->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label>
                                Status
                            </label>
                            <input type="checkbox" {{ $slider->status == '1' ? 'checked' : '' }} name="status" id="">

                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        @if ($slider->image)
                            {{-- <img src="{{ asset('assets/uploads/slider/' . $sliders->image) }}" --}}
                            <img src="{{ asset("$slider->image") }}" style="width:70px; height:70px" alt="Slider" />
                            {{-- style="width: 200px;height:200px;" class="me-4 border" alt="img" /> --}}
                        @endif
                        <div class="col-md-12">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" id="" placeholder="your image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                        {{-- <div>
                            @if ($sliders->productImages)
                                <div class="row">
                                    @foreach ($sliders->productImages as $image)
                                        <div class="col-md-2">
                                            <br/>
                                            <img src="{{ asset($image->image) }}" style="width: 80px;height:80px;"
                                                class="me-4 border" alt="Img" />


                                            <a href="{{ url('admin/product-image/'.$image->id.'/delete')}}" class="d-block btn-danger" style="width: 80px;"
                                                onclick="myFunction()">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h5>No image added</h5>
                            @endif
                        </div> --}}
                        {{-- <div class="col-md-12">
                            <label>Image</label>
                            <input type="file" name="image" multiple class="form-control" id=""
                                placeholder="your image" />
                            <br />
                            <br />
                        </div> --}}

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
