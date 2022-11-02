@extends('layouts.front')
@section('title')
    {{ $category->meta_title }}
@endsection
@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection
@section('meta_description')
    {{ $category->meta_description }}
@endsection
{{-- <section class="home"> --}}
@section('content')
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
        <h1 class="text-center">PRODUCT</h1>
        <div class="row" style="margin-top: 30px;">

            @forelse ($products as $produ)
                <div class="col-md-3 py-3 py-md-0">

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
                                <h3>{{ $produ->name }}</h3>
                            </a>
                            <b>
                                <p>{{ $produ->slug }}</p>
                            </b>

                            <h5> {{ Helper::currency_converter($produ->selling_price) }}
                                <strike>{{ Helper::currency_converter($produ->original_price) }}
                                </strike>
                                {{-- <span> --}}
                                    {{-- <i class="fa-solid fa-heart"></i><br /><i class="fa-solid fa-cart-shopping"></i></span> --}}
                            </h5>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Product Avaliable for {{ $category->name }}</h4>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="row" style="margin-top: 30px;">

        </div>

    </div>
    <!-- product cards -->
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
