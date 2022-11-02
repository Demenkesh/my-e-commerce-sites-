<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
@extends('layouts.front')
@section('title')
    Welcome to Home of Tech
@endsection

@section('content')
    @include('layouts.inc.slider')
    <!-- category cards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">CATEGORIES</h1>
        <div class="row" style="margin-top: 30px;">
            @forelse ($featured_products as $cate)
                <div class="col-md-3 py-3 ">
                    <div class="card">
                        <img src="{{ asset("$cate->image") }}" class="w-100" alt="{{ $cate->name }}">
                        <div class="card-body">
                            <a href="{{ url('/collections/' . $cate->slug) }}">
                                <h6>{{ $cate->name }}</h6>
                            </a>

                            <p>{{ $cate->slug }}</p>

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <h5>NO CATGORIES AVALIABLE</h5>
                </div>
            @endforelse

        </div>
        <a href="{{ url('/categoryview') }}" id="viewmorebtn">View More</a>

    </div>
    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h1>Get Up To 50% Off</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, animi?</p>
            <div id="bannerbtn"><button>SHOP NOW</button></div>
        </div>
    </div>
    <!-- banner -->
    <!-- product cards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">Trending</h1>
        <div class="row" style="margin-top: 30px;">

            @forelse ($products as $produ)
                {{-- @if ($item->product) --}}

                <div class="col-md-3 py-3 product_data">

                    <div class="card">
                        @if ($produ->productImages->count() > 0)
                            <img src="{{ asset($produ->productImages[0]->image) }}" alt="{{ $produ->name }}">
                        @endif
                        @if ($produ->qty > 0)
                            <label class="stock bg-success" style="width: 5rem">In Stock</label>
                        @else
                            <label class="stock bg-danger">Out of Stock</label>
                        @endif
                        <div class="card-body">
                            <a href="{{ url('/collections/' . $produ->category->slug . '/' . $produ->slug) }}">
                                <h6>{{ $produ->name }}</h6>
                            </a>
                            <b>
                                <p>{{ $produ->slug }}</p>
                            </b>
                            <input type="hidden" class="prod_id" value="{{ $produ->id }}">
                            <h5>{{ Helper::currency_converter($produ->selling_price) }}
                                <strike>{{ Helper::currency_converter($produ->original_price) }}
                                </strike>
                                <span>
                                    {{-- <i class="fa-solid fa-cart-shopping addToCartBtn"></i> --}}
                                    <br />
                                    <i class="fa-solid fa-heart addToWishlistBtn"></i>
                                </span>
                            </h5>

                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                        {{-- <h4>No Product Avaliable </h4> --}}
                    </div>
                </div>
            @endforelse
        </div>

        <a href="{{ url('/productviews') }}" id="viewmorebtn">View More</a>

    </div>
    <!-- product cards -->
    <br />
    <!-- product cards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">Big-Discount</h1>
        <div class="row" style="margin-top: 30px;">
            <div class="owl-carousel products2 owl-theme">

                @forelse ($products1 as $produ)
                    {{-- @if ($item->product) --}}

                    <div class="col-md-10 py-3 product_data">

                        <div class="card">
                            @if ($produ->productImages->count() > 0)
                                <img src="{{ asset($produ->productImages[0]->image) }}" alt="{{ $produ->name }}">
                            @endif
                            @if ($produ->qty > 0)
                                <label class="stock bg-success" style="width: 5rem">In Stock</label>
                            @else
                                <label class="stock bg-danger">Out of Stock</label>
                            @endif
                            <div class="card-body">
                                <a href="{{ url('/collections/' . $produ->category->slug . '/' . $produ->slug) }}">
                                    <h6>{{ $produ->name }}</h6>
                                </a>
                                <b>
                                    <p>{{ $produ->slug }}</p>
                                </b>
                                <input type="hidden" class="prod_id" value="{{ $produ->id }}">
                                <h5>{{ Helper::currency_converter($produ->selling_price) }}
                                <strike>{{ Helper::currency_converter($produ->original_price) }}
                                </strike>
                                    <span>
                                        {{-- <i class="fa-solid fa-cart-shopping addToCartBtn"></i> --}}
                                        <br />
                                        <i class="fa-solid fa-heart addToWishlistBtn"></i>
                                    </span>
                                </h5>

                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @empty
                    <div class="col-md-12">
                        <div class="p-2">

                            <h4>No Product Avaliable </h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- product cards -->
    <!-- product cards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">New-arrival</h1>
        <div class="row" style="margin-top: 30px;">
            <div class="owl-carousel products1 owl-theme">

                @forelse ($products2 as $produ)
                    <div class="col-md-10 py-3  product_data">

                        <div class="card item">
                            @if ($produ->productImages->count() > 0)
                                <img src="{{ asset($produ->productImages[0]->image) }}" alt="{{ $produ->name }}">
                            @endif
                            @if ($produ->qty > 0)
                                <label class="stock bg-success" style="width: 5rem">In Stock</label>
                            @else
                                <label class="stock bg-danger">Out of Stock</label>
                            @endif
                            <div class="card-body">
                                <a href="{{ url('/collections/' . $produ->category->slug . '/' . $produ->slug) }}">
                                    <h6>{{ $produ->name }}</h6>
                                </a>
                                <b>
                                    <p>{{ $produ->slug }}</p>
                                </b>
                                <input type="hidden" class="prod_id" value="{{ $produ->id }}">
                                <h5>{{ Helper::currency_converter($produ->selling_price) }}
                                <strike>{{ Helper::currency_converter($produ->original_price) }}
                                </strike>
                                    <span>

                                        <br />
                                        <i class="fa-solid fa-heart addToWishlistBtn"></i>
                                    </span>
                                </h5>

                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Product Avaliable </h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- product cards -->
    <div class="container" style="margin-top: 100px">
        <hr />
    </div>
    <div class="container">
        <h3 style="font-weight: bold">PRODUCT.</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Doloremque vero eius ipsam incidunt illum totam nostrum quidem
            sit cumque fugit. Accusamus rem praesentium labore tempore ullam
            porro quaerat fugiat cum ipsum, sint perferendis voluptate ad,
            quod reiciendis officia! In voluptate quae expedita sunt eum
            placeat alias soluta. Rem commodi, impedit error doloribus
            ratione at provident beatae, aut doloremque sunt possimus
            voluptas recusandae nam aliquid eos quia minus harum repellat
            quae eveniet laborum dolore esse voluptate sed. Voluptate ullam
            dolor sapiente neque labore hic nam odio qui consectetur porro
            minima nesciunt suscipit vitae obcaecati reiciendis itaque ipsum
            unde, debitis nemo soluta!
        </p>

        <hr />
    </div>
    <!-- offer -->
    <div class="container" id="offer">
        <div class="row">
            <div class="col-md-3  sm py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h5>Fast Shipping</h5>
                <p>On all products</p>
            </div>
            <div class="col-md-3  py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h5>Fast Delivery</h5>
                <p>World wide</p>
            </div>
            <div class="col-md-3  py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h5>Best Choice</h5>
                <p>Of product</p>
            </div>
            <div class="col-md-3  py-3 py-md-0">
                <i class="fa-brands fa-battle-net"></i>
                <h5>Verified</h5>

            </div>
            {{-- <i class="fa-solid fa-badge-check"></i> --}}
        </div>
    </div>
    <!-- offer -->

    <style>
        .stock {
            font-size: 13px;
            padding: 4px 13px;
            border-radius: 5px;
            color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
            float: right;
        }
    </style>
@endsection
