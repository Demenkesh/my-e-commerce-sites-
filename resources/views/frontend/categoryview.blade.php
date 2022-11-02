@extends('layouts.front')
@section('title')
    Category
@endsection
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
                                <h3>{{ $cate->name }}</h3>
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

        <div class="row" style="margin-top: 30px;">

        </div>
    </div>
@endsection
