<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Add Category Page
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>Add CATEGORY PAGE</h4>
        </div>
        <div class="card-body my-custom-scrollbar">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            {{-- <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3 ">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id=""
                            placeholder="your name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id=""
                            placeholder="your slug">
                        @error('slug')
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
                        <label>Meta Title</label>
                        <textarea name="meta_title" rows="3" class="form-control" id="" placeholder="meta title">{{ old('meta_title') }}</textarea>
                        @error('meta_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control" id="" placeholder="meta keyword">{{ old('meta_keyword') }}</textarea>
                        @error('meta_keyword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Meta description</label>
                        <textarea name="meta_description" rows="3" class="form-control" id="" placeholder="meta description">{{ old('meta_description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <div class="">
                            <input type="checkbox" name="status" id="">
                            <label>
                                Status
                            </label>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="">
                            <input type="checkbox" name="popular" id="">
                            <label>
                                Popular
                            </label>
                            @error('popular')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Image</label>
                        <input type="file" name="image[]" class="form-control" id=""
                            placeholder="your image">{{ old('image') }}
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <br />
                    <br />
                    <br />
                    <br />

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form> --}}
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                id="" placeholder="your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                                id="" placeholder="your slug">
                            @error('slug')
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
                    </div>
                    <div class="tab-pane fade" id="pills-meta" role="tabpanel" aria-labelledby="pills-meta-tab">
                        <div class="col-12 mb-3">
                            <label>Meta Title</label>
                            <textarea name="meta_title" rows="3" class="form-control" id="" placeholder="meta title">{{ old('meta_title') }}</textarea>
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" rows="3" class="form-control" id="" placeholder="meta keyword">{{ old('meta_keyword') }}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Meta description</label>
                            <textarea name="meta_description" rows="3" class="form-control" id="" placeholder="meta description">{{ old('meta_description') }}</textarea>
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
                                <input type="checkbox" name="status" id="">

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
                                <input type="checkbox" name="popular" id="">
                                @error('popular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Image</label>
                            <input type="file" name="image[]" class="form-control" id=""
                                placeholder="your image">{{ old('image') }}
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <br />
                        <br />
                        <br />
                        <br />

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <style>
        .my-custom-scrollbar {
            position: relative;
            width: 1120px;
            height: 470px;
            overflow: auto;
        }


        /* Medium devices ( phones) */
        @media screen and (max-width: 767px) {
            .my-custom-scrollbar {
                position: relative;
                width: 500px;
                height: 400px;
                overflow: auto;
            }
        }

        /* Large devices (tablets, ) */
        @media screen and (min-width: 768px) and (max-width: 1023px) {
            .my-custom-scrollbar {
                position: relative;
                width: 760px;
                height: 400px;
                overflow: auto;
            }
        }

        /* Extra large devices ( desktops, 1200px and up) */
        @media screen and (min-width: 1024px) {
            .my-custom-scrollbar {
                position: relative;
                width: 800px;
                height: 450px;
                overflow: auto;

            }
        }
    </style>
    <script>
        var myCustomScrollbar = document.querySelector('.my-custom-scrollbar');
        var ps = new PerfectScrollbar(myCustomScrollbar);

        var scrollbarY = myCustomScrollbar.querySelector('.ps__rail-y');

        myCustomScrollbar.onscroll = function() {
            scrollbarY.style.cssText =
                `top: ${this.scrollTop}px!important; height: 400px; right: ${-this.scrollLeft}px`;
        }
    </script> --}}
@endsection
