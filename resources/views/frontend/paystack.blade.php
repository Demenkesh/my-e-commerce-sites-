<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/jpg"
    href="data:image/png;base64,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" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paystack</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/checkout/bootstrap4.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/checkout/style.css') }}" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="data:image/png;base64,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"
            alt="" width="72" height="72">
            <h2>Paystack</h2>
            @if (Session::has('error'))
                <font color="red">{{ Session::get('error') }}</font>
            @endif
        </div>
        {{-- the hidden form --}}
        <form action="{{ url('paystack-order') }}" class="form-horizontal" role="form" method="POST"
            class="require-validation" data-cc-on-file="false" id="payment-form">
            @csrf
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">

                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted"> Review Order</span>
                        <span class="badge badge-secondary badge-pill">
                            <div class="pull-right"><small><a class="afix-1" href="cart">Edit
                                        Cart</a></small></div>
                        </span>
                    </h4>
                    @if ($cartItems->count() > 0)
                        <ul class="list-group mb-3">
                            @php $total = 0; @endphp
                            @php $shippingfee = 0; @endphp
                            @forelse ($cartItems as $item)
                                @if ($item->product)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <a
                                                href=" {{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                @if ($item->product->productImages)
                                                    <img src="{{ asset($item->product->productImages[0]->image) }}"
                                                        class="img-fluid rounded-3"
                                                        alt="{{ $item->product->name }}"style="width:100px;">
                                                @else
                                                    <img src="" class="img-fluid rounded-3"
                                                        alt="{{ $item->product->name }}">
                                                @endif
                                            </a>
                                            <h6 class="my-0 text-muted"><a
                                                    href=" {{ url('collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                                                    <div class="col-xs-12">{{ $item->product->name }}</div>
                                                </a></h6>
                                            <small class="text-muted">
                                                Quantity:<span>{{ $item->prod_qty }}</span>
                                                Shipping fee:<span>{{ Helper::currency_converter($item->product->tax * $item->prod_qty ) }} </span>
                                            </small>
                                        </div>
                                        <span class="text-muted"> {{ Helper::currency_converter($item->product->selling_price * $item->prod_qty) }}

                                        </span>
                                    </li>

                                    @php $total += ($item->product->selling_price * $item->prod_qty) + ( $item->product->tax * $item->prod_qty)  ; @endphp
                                    @php $shippingfee +=  $item->product->tax * $item->prod_qty  ; @endphp
                                    {{-- + $item->product->tax --}}
                                @endif
                            @empty
                            @endforelse
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping fee</span>
                                <span class="text-muted">{{ Helper::currency_converter($shippingfee) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total </span>
                                <strong>
                                    {{ Helper::currency_converter($total) }}
                                    {{-- {{ Helper::currency_converter($total) }} --}}
                                </strong>
                            </li>
                        </ul>
                        <div class="form-group">
                            <hr />
                        </div>
                        <br />
                        <button class="btn btn-primary" type="submit">Pay</button>
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
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>

                                <input type="text" name="firstname" required id="name" readonly
                                    placeholder="Enter name" class="form-control firstname"
                                    value="{{ Auth::user()->name }}" />
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" name="lastname" required class="form-control lastname"
                                    id="lastName" readonly value="{{ Auth::user()->lastname }}" />
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>


                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Enter email" required readonly name="email"
                                id="email" class="form-control email" value="{{ Auth::user()->email }}" />
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address1" required class="form-control address1"
                                value="{{ Auth::user()->address1 }}" />
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control country" required name="country"
                                    value="{{ Auth::user()->country }}" />
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State</label>
                                <input type="text" name="state" required class="form-control state"
                                    value="{{ Auth::user()->state }}" />
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="state">City</label>
                                <input type="text" name="city" required class="form-control city"
                                    value="{{ Auth::user()->city }}" />
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" name="zipcode" required class="form-control zipcode"
                                    value="{{ Auth::user()->zipcode }}" />
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="zip">Phone number</label>
                                <input type="number" name="phone" placeholder="Enter number" required
                                    id="number" class="form-control number" value="{{ Auth::user()->phone }}" />
                                <div class="invalid-feedback">
                                    phone number required.
                                </div>
                            </div>
                            <div class="col-6"hidden>
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" placeholder="Enter amount" id="amount"
                                    class="form-control" value="{{ $total}}">
                            </div>
                        </div>

                        <hr class="mb-4">
                    </form>
                </div>

            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy;2018 {{ config('app.name') }}</p>
            </footer>
        </form>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('frontend/checkout/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('frontend/checkout/popper.js') }}"></script>
    <script src="{{ asset('frontend/checkout/vendor.js') }}"></script>
    {{-- <script src="{{ asset('frontend/checkout/custom.js') }}"></script> --}}
</body>

</html>
