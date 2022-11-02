<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Edit Product Page
@endsection
@section('content')
    <div class="card ">
        @if (session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif
        <div class="card-header bg-primary">
            <h4>Edit product page</h4>
        </div>

        <div class="card-body my-custom-scrollbar">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('update-product/' . $products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-description-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-description" type="button" role="tab"
                            aria-controls="pills-description" aria-selected="false">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-meta-tab" data-bs-toggle="pill" data-bs-target="#pills-meta"
                            type="button" role="tab" aria-controls="pills-meta" aria-selected="false">Meta</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-quantity-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-quantity" type="button" role="tab" aria-controls="pills-quantity"
                            aria-selected="false">Quantity</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Image</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="col-md-12 mb-3">
                            <select class="form-select-lg" name="category_id"
                                id="form"value="{{ old('category_id') }}">
                                <option value="">Select a Category</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3 ">
                            <label class="form-label">Name</label>
                            <input type="text" value="{{ $products->name }}" name="name" class="form-control"
                                id="" placeholder="your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Brand</label>
                            <input type="text" value="{{ $products->slug }}" name="slug" class="form-control"
                                id="" placeholder="your brand">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-description"
                        role="tabpanel"aria-labelledby="pills-description-tab">
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="your description">{{ $products->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Small Description</label>
                            <textarea name="small_description" rows="3" class="form-control" id="" placeholder="your detail">{{ $products->small_description }}</textarea>
                            @error('small_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-meta" role="tabpanel" aria-labelledby="pills-meta-tab">
                        <div class="col-12 mb-3">
                            <label>Meta Title</label>
                            <textarea name="meta_title" rows="3" class="form-control" id="" placeholder="meta title">{{ $products->meta_title }}</textarea>
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" rows="3" class="form-control" id="" placeholder="meta keyword">{{ $products->meta_keyword }}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Meta description</label>
                            <textarea name="meta_description" rows="3" class="form-control" id=""
                                placeholder="meta description">{{ $products->meta_description }}</textarea>
                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-quantity" role="tabpanel" aria-labelledby="pills-quantity-tab">
                        <div class="col-12 mb-3">
                            <div class="">
                                <label>
                                    Quantity
                                </label>
                                <input type="number" value="{{ $products->qty }}" class="form-control" name="qty"
                                    id="">

                                @error('qty')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label>
                                Shipping fee
                            </label>
                            <input type="number" value="{{ $products->tax }}" class="form-control" name="tax"
                                id="">

                            @error('tax')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="col-12 mb-3">
                            <label>
                                Selling Price
                            </label>
                            <input type="number" class="form-control" value="{{ $products->selling_price }}"
                                name="selling_price" id="">

                            @error('selling_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="col-12 mb-3">
                            <label>
                                Original Price
                            </label>
                            <input type="number" class="form-control" value="{{ $products->original_price }}"
                                name="original_price" id="">

                            @error('original_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col-6 mb-3">
                            <label>
                                New-arrival
                            </label>
                            <input type="checkbox" {{ $products->newarrival == '1' ? 'checked' : '' }} name="newarrival"
                                id="">

                            @error('new-arrival')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="col-6 mb-3">
                            <label>
                                Big-discount
                            </label>
                            <input type="checkbox" {{ $products->bigdiscount == '1' ? 'checked' : '' }}
                                name="bigdiscount" id="">

                            @error('big-discount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="col-3 mb-3" hidden>

                            <label>Trending</label>

                            <input type="text" id="form1" name="trending" value="1"
                                class="form-control form-control" readonly />

                        </div>
                        
                        <div>
                            @if ($products->productImages)

                                <div class="row">
                                    @foreach ($products->productImages as $image)
                                        <div class="col-md-2">
                                            <br />
                                            <img src="{{ asset($image->image) }}" style="width: 80px;height:80px;"
                                                class="me-4 border" alt="Img" />

                                            <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                class="d-block btn-danger" style="width: 80px;"
                                                onclick="myFunction()">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h5>No image added</h5>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label>Image</label>
                            <input type="file" name="image[]" multiple class="form-control" id=""
                                placeholder="your image" />
                            <br />
                            <br />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
