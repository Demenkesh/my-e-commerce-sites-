<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Add Product Page
@endsection
@section('content')
    <div class="card ">
        <div class="card-header bg-primary">
            <h4>Add Product Page</h4>
        </div>
        <div class="card-body ">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description"
                            type="button" role="tab" aria-controls="description"
                            aria-selected="false">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button"
                            role="tab" aria-controls="meta" aria-selected="false">Meta's</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="quantity-tab" data-bs-toggle="tab" data-bs-target="#quantity"
                            type="button" role="tab" aria-controls="quantity" aria-selected="false">Quantity</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button"
                            role="tab" aria-controls="image" aria-selected="false">Add Image</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">

                        @csrf

                        <div class="col-md-12 mb-3">
                            <select class="form-select-lg" id="form"value="{{ old('category_id') }}"
                                name="category_id">
                                <option value="">Select a Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-12 mb-3 ">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" rows="3" value="{{ old('name') }}"
                                class="form-control" id="" placeholder="your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Brand</label>
                            <input type="text" name="slug" rows="3" value="{{ old('slug') }}"
                                class="form-control" id="" placeholder="your Brand">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="" placeholder="your description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Small Description</label>
                            <textarea name="small_description" rows="3" class="form-control" id="" placeholder="your detail">{{ old('small_description') }}</textarea>
                            @error('small_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
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
                            <textarea name="meta_description" rows="3" class="form-control" id=""
                                placeholder="meta description">{{ old('meta_description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="col-12 mb-3">
                            <div class="">
                                <label>
                                Big-discount
                                </label>
                                <input type="checkbox" name="bigdiscount" id="">

                                @error('bigdiscount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="">
                                <label>
                                New-arrival
                                </label>
                                <input type="checkbox" name="newarrival" id="">

                                @error('newarrival')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3 mb-3" hidden>

                            <label>
                                Trending
                            </label>
                            <input type="text"  id="form1" name="trending" value="1" class="form-control form-control"
                            readonly />
                        </div>
                        <div class="col-md-12">
                            <label>Image</label>
                            <input type="file" name="image[]" multiple class="form-control" />{{ old('image') }}

                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="quantity" role="tabpanel" aria-labelledby="quantity-tab">
                        <div class="col-12 mb-3">
                            <div class="">
                                <label>
                                    Quantity
                                </label>
                                <input type="number" class="form-control" name="qty" id="">

                                @error('qty')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class=""></div>
                            <label>
                                Shipping fee
                            </label>
                            <input type="number" class="form-control" name="tax" id="">

                            @error('tax')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label>
                                Selling Price
                            </label>
                            <input type="number" class="form-control" name="selling_price" id="">

                            @error('selling_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="col-12 mb-3">
                            <label>
                                Original Price
                            </label>
                            <input type="number" class="form-control" name="original_price" id="">

                            @error('original_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>
                </div>



            </form>

        </div>
    </div>
@endsection
