@extends('layouts.front')
@section('title')
    Contact us
@endsection
@section('content')
    {{-- @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif --}}


<!-- about -->
<div class="container" id="about">
    <h1>ABOUT US</h1>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-6 py-3 py-md-0">
            <div class="card">
                <img src="./image/about.png" alt="">
            </div>
        </div>
        <div class="col-md-6 py-3 py-md-0">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, vitae numquam aspernatur repellendus autem sint beatae, facilis quas deserunt iure natus minus ab deleniti eveniet neque quasi ullam id in alias consectetur quia nesciunt. Exercitationem vitae atque commodi architecto tenetur! Fugit necessitatibus nesciunt, eligendi tempora reprehenderit suscipit doloribus animi mollitia maiores? Numquam, est laborum dicta aperiam nobis deserunt libero non dolorem cum dolorum distinctio commodi iure, tenetur animi? Nam similique culpa consequuntur itaque quasi ipsa placeat ea perferendis est quo, ut eaque quis dolorem, aliquam iste reprehenderit provident neque magnam voluptatibus. Eaque provident omnis reiciendis ducimus, magni qui voluptatem quibusdam.</p>
        </div>
    </div>
</div>
<!-- about -->


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
@endsection
