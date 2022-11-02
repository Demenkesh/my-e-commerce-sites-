<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('layouts.front')
@section('title')
    {{ $product->meta_title }}
@endsection
@section('meta_keyword')
    {{ $product->meta_keyword }}
@endsection
@section('meta_description')
    {{ $product->meta_description }}
@endsection

@section('content')
    <div class="product_data">
        <div class="py-3 py-md-5">
            <div class="container">
                <div class="row">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ url('/add-rating') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="rating-css">
                                            <div class="star-icon">
                                                @if ($user_rating)
                                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                                        <input type="radio" value="{{ $i }}"
                                                            name="product_rating" checked id="rating{{ $i }}">
                                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                                    @endfor
                                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                                        <input type="radio" value="{{ $j }}"
                                                            name="product_rating" id="rating{{ $j }}">
                                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                                    @endfor
                                                @else
                                                    <input type="radio" value="1" name="product_rating" checked
                                                        id="rating1">
                                                    <label for="rating1" class="fa fa-star"></label>
                                                    <input type="radio" value="2" name="product_rating"
                                                        id="rating2">
                                                    <label for="rating2" class="fa fa-star"></label>
                                                    <input type="radio" value="3" name="product_rating"
                                                        id="rating3">
                                                    <label for="rating3" class="fa fa-star"></label>
                                                    <input type="radio" value="4" name="product_rating"
                                                        id="rating4">
                                                    <label for="rating4" class="fa fa-star"></label>
                                                    <input type="radio" value="5" name="product_rating"
                                                        id="rating5">
                                                    <label for="rating5" class="fa fa-star"></label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-3">
                        <div class="bg-white border">
                            @if ($product->productImages)
                                {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img"> --}}
                                <div class="exzoom" id="exzoom">

                                    <div class="exzoom_img_box">
                                        <ul class='exzoom_img_ul'>
                                            @foreach ($product->productImages as $itemimg)
                                                <li>
                                                    {{-- <img src="" /> --}}
                                                    <img src="{{ asset($itemimg->image) }}" class="w-100" alt="Img">
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>

                                    <div class="exzoom_nav"></div>

                                    <p class="exzoom_btn">
                                        <a href="javascript:void(0);" class="exzoom_prev_btn">
                                            < </a>
                                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                    </p>
                                </div>
                            @else
                                No Image
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 mt-3">
                        <div class="product-view">
                            <h4 class="product-name">
                                {{ $product->name }}
                                @if ($product->qty > 0)
                                    <label class="label-stock bg-success">In Stock</label>
                                @else
                                    <label class="label-stock bg-danger">Out of Stock</label>
                                @endif
                            </h4>
                            <hr>
                            <p class="product-path">
                                Home /{{ $product->category->name }} /{{ $product->name }}
                            </p>
                            <div>
                                <span class="selling-price">
                                    {{ Helper::currency_converter($product->selling_price) }}</span>
                                <span
                                    class="original-price">{{ Helper::currency_converter($product->original_price) }}</span>
                            </div>

                            <div class="col-md-6 mb-3 ">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <b><label>Quantity</label></b>
                                <input type="text" class=" qty-input" id="amount" readonly
                                    style="border:0; color:#f6931f; font-weight:bold;">


                                <div id="slider"></div>
                            </div>
                            <div class="mt-2">

                                <button type="button" class="btn btn-primary addToCartBtn">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>
                                <button type="button"class="btn btn-primary addToWishlistBtn">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </button>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0">Brand</h5>
                                <p>
                                    {!! $product->slug !!}
                                </p>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0">Small Description</h5>
                                <p>
                                    {!! $product->small_description !!}
                                </p>
                                @php $ratenum = number_format ($rating_value) @endphp
                                <div class="star">
                                    <span>
                                        @if ($ratings->count() > 0)
                                            {{ $ratings->count() }}Ratings
                                        @else
                                        @endif
                                    </span>
                                    @for ($i = 1; $i <= $ratenum; $i++)
                                        <i class="fas fa-star checked"></i>
                                    @endfor
                                    @for ($j = $ratenum + 1; $j <= 5; $j++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <br />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 ">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Rate this product
                        </button>
                        <a href="{{ url('add-review/' . $product->slug . '/userreview') }}" class="btn btn-primary">
                            Write a review
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card shadow">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {!! $product->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 shadow mt-4">
                        <div class="card-header bg-white">
                            <h5>CUSTOMER COMMENTS</h5>
                        </div>
                        @foreach ($reviews as $item)
                            <div class="user-review">
                                <b><q><label
                                            for="">{{ $item->user->name . '' . $item->user->lastname }}</label></q></b>
                                @if ($item->user_id == Auth::id())
                                    <a href="{{ url('edit-review/' . $product->slug . '/userreview') }}">Edit</a>
                                @endif
                                <br />
                                @php
                                    $rating = App\Models\Rating::where('prod_id', $product->id)
                                        ->where('user_id', $item->user->id)
                                        ->first();
                                @endphp
                                <div class="float-end">
                                    @if ($rating)
                                        @php $user_rated = $rating->stars_rated @endphp
                                        @for ($i = 1; $i <= $user_rated; $i++)
                                            <i class="fas fa-star checked"></i>
                                        @endfor
                                        @for ($j = $user_rated + 1; $j <= 5; $j++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    @endif
                                </div>
                                <small class="">Reviewed on {{ $item->created_at }}</small>
                                <hr />
                                <p class="card-body"> {{ $item->user_review }} </p>
                            </div>
                        @endforeach
                    </div>
                </div>

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
        </div>

    </div>


    </div>
    <style>
        .navbar-brand {
            display: none;
        }

        .product-view .product-name {
            font-size: 24px;
            color: #1c1c50;
        }

        .product-view .product-name .label-stock {
            font-size: 13px;
            padding: 4px 13px;
            border-radius: 5px;
            color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
            float: right;
        }

        .product-view .product-path {
            font-size: 13px;
            font-weight: 500;
            color: #252525;
            margin-bottom: 16px;
        }

        .product-view .selling-price {
            font-size: 26px;
            color: #000;
            font-weight: 600;
            margin-right: 8px;
        }

        .product-view .original-price {
            font-size: 18px;
            color: #937979;
            font-weight: 400;
            text-decoration: line-through;
        }

        /* rating */
        .rating-css div {
            color: #ffe400;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        /* End of Star Rating */
    </style>
    <script>
        // for my slider
        $(function() {
            $("#slider").slider({
                value: 1,
                min: 1,
                max: 1000,
                step: 1,
                slide: function(event, ui) {
                    $("#amount").val("" + ui.value);
                }
            });
            $("#amount").val("" + $("#slider").slider("value"));
        });
    </script>
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": true,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });

        });
    </script>
@endsection
