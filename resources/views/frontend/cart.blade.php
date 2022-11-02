@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5 ">
            <div class="row d-flex justify-content-center align-items-center  h-100">
                <div class="col-10 mb-auto shadow">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>
                    <div class="card rounded-3 mb-4  cartsitem ">
                        @if ($cartItems->count() > 0)
                            <div class="card-body p-4 ">
                                @php $total = 0; @endphp
                                @forelse ($cartItems as $item)
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
                                            @if ($item->product->qty >= $item->prod_qty)
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex  prod_id">
                                                    <button class="btn btn-link px-2 changeQuantity"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input id="form1" min="0" name="qty"
                                                        value="{{ $item->prod_qty }}" type="number" readonly
                                                        class="form-control form-control-sm qty-input" />
                                                    <button class="btn btn-link px-2 changeQuantity"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                @php $total += $item->product->selling_price * $item->prod_qty ;  @endphp
                                            @else
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <label class="label-stock bg-danger ">Out of Stock</label>
                                                </div>
                                            @endif
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0">
                                                    {{ Helper::currency_converter($item->product->selling_price * $item->prod_qty) }}
                                                </h5>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="" class="text-danger  delete-cart-item"
                                                    onclick="myFunction()"><i class="fas fa-trash fa-lg"></i></a>
                                            </div>
                                        </div>
                                        <br />
                                        <hr />
                                    @endif
                                @empty
                                @endforelse
                                <div class="card-body">
                                    <div class="card-body">
                                        <h6> Total price:{{ Helper::currency_converter($total) }}</h6>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <a href="{{ url('checkout') }}">
                                                    <p class="imagess">
                                                        <img
                                                            src="data:image/png;base64,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">
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <a href="{{ url('stripecheckout') }}">
                                                    <p class="images">
                                                        <img
                                                            src="data:image/jpeg;base64,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">
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <a href="{{ url('paystackcheckout') }}" class="float-end">
                                                    <p class="images">
                                                        <img src="data:image/png;base64,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"
                                                            class="img-fluid rounded-3">
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <h5>Nothing was added <i class="fa-solid fa-cart-shopping"></i></h5>
                                <a href="{{ url('/') }}">
                                    <button type="button" class="btn btn-danger btn-block btn-lg">Go back and place
                                        order</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <style>
        .images img {
            height: 2.7rem;
        }
        .imagess img {
            height: 5rem;
        }
    </style>
@endsection
