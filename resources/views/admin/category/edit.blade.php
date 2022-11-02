<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Edit Category Page
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>Edit CATEGORY PAGE</h4>
        </div>
        <div class="card-body ">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('update-category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-meta-tab" data-bs-toggle="pill" data-bs-target="#pills-meta"
                            type="button" role="tab" aria-controls="pills-meta" aria-selected="false">Meta</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Profile</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="col-md-12 mb-3 ">
                            <label class="form-label">Name</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control"
                                id="" placeholder="your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" value="{{ $category->slug }}" name="slug" class="form-control"
                                id="" placeholder="your slug">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="your description">{{ $category->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col-6 mb-3">
                            <div class="">
                                <label>
                                    Status
                                </label>
                                <input type="checkbox" {{ $category->status == '1' ? 'checked' : '' }} name="status"
                                    id="">

                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="">
                                <label>
                                    Popular
                                </label>
                                <input type="checkbox" {{ $category->popular == '1' ? 'checked' : '' }} name="popular"
                                    id="">

                                @error('popular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        @if ($category->image)
                            <img src="{{ asset("$category->image") }}"
                                style="width: 70px;height:70px;" class="me-4 border" alt="img" />
                                {{-- <img src="{{ asset("$slider->image") }}" style="width:70px; height:70px" alt="Slider" /> --}}
                        @endif
                        <div class="col-md-12">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" id=""
                                placeholder="your image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br />
                        <br />
                        <br />
                        <br />

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-meta" role="tabpanel" aria-labelledby="pills-meta-tab">
                        <div class="col-12 mb-3">
                            <label>Meta Title</label>
                            <textarea name="meta_title" rows="3" class="form-control" id="" placeholder="meta title">{{ $category->meta_title }}</textarea>
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" rows="3" class="form-control" id="" placeholder="meta keyword">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Meta description</label>
                            <textarea name="meta_description" rows="3" class="form-control" id="" placeholder="meta description">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
