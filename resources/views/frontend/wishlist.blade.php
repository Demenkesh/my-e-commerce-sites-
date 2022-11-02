{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
{{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
@extends('layouts.front')
@section('title')
    My Wishlist
@endsection
@section('content')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 shadow mb-auto">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Wishlist</h3>

                    </div>

                    <div class="card rounded-3 mb-4  wishlistItemsitem">
                        <div class="card-body p-4">
                            @forelse ($wishlistItems as $item)
                                @if ($item->product)
                                    <div class="row d-flex justify-content-between align-items-center product_data">

                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <a
                                                href=" {{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                @if ($item->product->productImages)
                                                    <img src="{{ asset($item->product->productImages[0]->image) }}"
                                                        class="img-fluid rounded-3" alt="{{ $item->product->name }}">
                                                @else
                                                    <img src="" class="img-fluid rounded-3"
                                                        alt="{{ $item->product->name }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <a
                                                href=" {{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                <p class="lead fw-normal mb-2">{{ $item->product->name }}</p>
                                            </a>


                                        </div>

                                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">

                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">${{ $item->product->selling_price }}</h5>
                                        </div>


                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="delete" class="text-danger  delete-wishlist-item"
                                                onclick="myFunction2()"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>

                                    </div>
                                    <br />
                                    <hr />
                                @endif
                            @empty
                                <div class="col-md-12">
                                    <h5>Nothing was added</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* .navbar-brand {
            display: none;
        } */
    </style>
@endsection
